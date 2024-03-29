<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\OrderDetailRepository;
use App\Contracts\Repositories\OrderRepository;
use App\Contracts\Repositories\ProductAttributeRepository;
use App\Contracts\Repositories\UserRepository;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Jobs\SendEmailForApproveOrder;
use App\Jobs\SendEmailForOrderSuccess;
use App\Mail\ApprovedOrder;
use App\Mail\OrderUser;
use App\Models\Order;
use App\Notifications\OrderAdminNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public $orderRepository;
    public $orderDetailRepository;
    public $productAttributeRepository;
    public $userRepository;

    public function __construct(
        OrderRepository $orderRepository,
        OrderDetailRepository $orderDetailRepository,
        UserRepository $userRepository,
        ProductAttributeRepository $productAttributeRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->productAttributeRepository = $productAttributeRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->getAllOrders();
        $status = [
            'approve' => 1,
            'reject' => 2,
            'processing' => 3,
            'cancel' => 4,
            'refund' => 5,
            'completed' => 6,
        ];

        return view('admin.orders.index', compact('orders', 'status'));
    }

    public function show($id)
    {
        $orderDetails = $this->orderDetailRepository->showDetailsOrders($id);

        return view('admin.orders.details', compact('orderDetails'));
    }

    public function getStatusOrder()
    {
        $orders = $this->orderRepository->getStatusOrder();

        return view('user.orders', compact('orders'));
    }

    public function getOrderUser()
    {
        $orders = $this->orderRepository->getOrderUserApprove();

        return view('user.history_order', compact('orders'));
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $cart = Session::get('cart');
            $amount = config('const.active');
            foreach ($cart as $item) {
                $productAttr = $this->productAttributeRepository
                    ->where("product_id", $item["id"])
                    ->where("memory_id", $item["memory"])
                    ->where("color_id",  $item["color"])
                    ->firstOrFail();
                if ($productAttr->quantity < $item["quantity"]) {
                    return redirect()->back();
                }

                $productAttr->update([
                    "quantity" => $productAttr->quantity - $item["quantity"]
                ]);
            }

            foreach ($cart as $value) {
                $amount += $value['price'] * $value['quantity'];
            }

            $data = $request->only(['user_id', 'phone', 'address', 'payment_method']);
            $data['amount'] = $amount;
            $data['status'] = config('const.pending');
            $order = $this->orderRepository->create($data);

            foreach ($cart as $value) {
                // $dataCart[] = [
                //     'order_id' => $order->id,
                //     'product_id' => $value['id'],
                //     'color_id' => $value['color'],
                //     'memory_id' => $value['memory'],
                //     'price' => $value['price'],
                //     'quantity' => $value['quantity'],
                //     'image' => $value['image'],
                // ];
                $this->orderDetailRepository->create(
                    [
                        'order_id' => $order->id,
                        'product_id' => $value['id'],
                        'color_id' => $value['color'],
                        'memory_id' => $value['memory'],
                        'price' => $value['price'],
                        'quantity' => $value['quantity'],
                        'image' => $value['image'],
                    ]
                );
            }

            // $this->orderDetailRepository->insert($dataCart);

            Session::forget('cart');

            $admin = $this->userRepository->findAdmin();

            $orderData = [
                'order_id' => $order->id,
                'content' => $order->user->name,
            ];

            // send notify admin
            $admin->notify(new OrderAdminNotification($orderData));

            // send mail for user
            Mail::to($order->user->email)
                ->send(new OrderUser($order));

            DB::commit();

            return redirect()->route("home")->with("checkout_success", __("common.checkout_sucess"));
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
        }
    }

    public function state($id)
    {
        try {
            DB::beginTransaction();

            $order = $this->orderRepository->findOrFail($id);
            // $orderDetails = $this->orderDetailRepository->showDetailsOrders($id);

            // foreach ($orderDetails as $item) {
            //     $productAttr = $item->product->productAttributes
            //         ->where('color_id', $item->color_id)
            //         ->where('memory_id', $item->memory_id)
            //         ->firstOrFail();
            //     if ($item->quantity > $productAttr->quantity) {
            //         return redirect()->route('admin.orders.index')->with('alert', __('common.fail_quantity'));
            //     }

            //     $remaining = $productAttr->quantity - $item->quantity;

            //     $productAttrIds[] = [$productAttr->id];
            //     $dataQuantity[] = [
            //         'quantity' => $remaining,
            //     ];
            // } 
            // // dd($productAttrIds, $dataQuantity);
            // DB::table('product_attributes')->whereIn('id', $productAttrIds)->update($dataQuantity);
            // $this->orderRepository->whereId($id)->update(
            //     [
            //         'status' => config('const.approve'),
            //     ]
            // );

            // foreach ($orderDetails as $item) {
            //     $productAttr = $item->product->productAttributes
            //         ->where('color_id', $item->color_id)
            //         ->where('memory_id', $item->memory_id)
            //         ->firstOrFail();
            //     if ($item->quantity > $productAttr->quantity) {
            //         return redirect()->route('admin.orders.index')->with('alert', __('common.fail_quantity'));
            //     }

            //     $remaining = $productAttr->quantity - $item->quantity;
            //     $productAttr->update(
            //         [
            //             'quantity' => $remaining,
            //         ]
            //     );
            // }

            $this->orderRepository->whereId($id)->update(
                [
                    'status' => config('const.approve'),
                ]
            );

            // send mail to user after admin approve order
            Mail::to($order->user->email)
                ->send(new ApprovedOrder($order));

            DB::commit();

            return redirect()->route('admin.orders.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
        }
    }

    public function rejectOrder($id)
    {
        $this->orderRepository->whereId($id)->update(
            [
                'status' => config('const.reject'),
            ]
        );

        return redirect()->route('admin.orders.index');
    }

    public function destroy(Order $order)
    {
        try {
            DB::beginTransaction();
            foreach ($order->orderDetails as $item) {
                $productAttr = $this->productAttributeRepository
                    ->where("product_id", $item->product_id)
                    ->where("color_id", $item->color_id)
                    ->where("memory_id", $item->memory_id)
                    ->firstOrFail();
                $productAttr->update([
                    "quantity" => $productAttr->quantity + $item->quantity
                ]);
            }

            $order->orderDetails()->delete();
            $order->delete();

            DB::commit();

            return redirect()->back();
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
        }
    }

    public function actionStatusOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $status = (int) $request->status;
        switch ($status) {
            case config("const.approve"):
                $this->actionWithPendding($order, $status);
                break;
            case config("const.reject"):
                $this->actionWithPendding($order, $status);
                break;
            case config("const.processing"):
                $this->actionIsProcessing($order, $status);
                break;
            case config("const.cancel"):
                $this->actionIsCancel($order, $status);
                break;
            case config("const.refund"):
                $this->actionIsRefund($order, $status);
                break;
            case config("const.completed"):
                $this->actionIsRefund($order, $status);
                break;
            default:
                throw new Exception("fail");
        }
    }

    public function actionWithPendding($order, $status)
    {
        if ($order->status == config("const.pendding")) {
            $this->updateStatus($order, $status);
        } else {
            throw new Exception("fail");
        }
    }

    public function actionIsProcessing($order, $status)
    {
        if ($order->status == config("const.approve") || $order->status == config("const.refund")) {
            $this->updateStatus($order, $status);
        } else {
            throw new Exception("fail");
        }
    }

    public function actionIsCancel($order, $status)
    {
        if ($order->status == config("const.cancel")) {
            $this->updateStatus($order, $status);
        } else {
            throw new Exception("fail");
        }
    }

    public function actionIsRefund($order, $status)
    {
        if ($order->status == config("const.processing") || $order->status == config("const.completed")) {
            foreach ($order->orderDetails as $item) {
                $color = $item->color_id;
                $memory = $item->memory_id;
                foreach ($item->product->productAttributes as $it) {
                    $it->where("color_id", $color)
                        ->where("memory_id", $memory)
                        ->update([
                            "quantity" => $item->quantity
                        ]);
                }
            }
            $this->updateStatus($order, $status);
        } else {
            throw new Exception("fail");
        }
    }
    public function actionIsCompleted($order, $status)
    {
        if ($order->status == config("const.processing")) {
            $this->updateStatus($order, $status);
        } else {
            throw new Exception("fail");
        }
    }

    public function updateStatus($order, $status)
    {

        try {
            DB::beginTransaction();

            $order->update(
                [
                    'status' => $status,
                ]
            );

            // send mail to user after admin approve order
            Mail::to($order->user->email)
                ->send(new ApprovedOrder($order));

            DB::commit();

            return response()->json([
                "data" => $order,
                "status" => 200
            ]);
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
        }
    }

    public function getOrdersForDatatable()
    {
        $orders = $this->orderRepository->getAllOrders();

        return response()->json([
            "data" => $orders
        ]);
    }

    public function getApiAllOrder()
    {
        if (Auth::user()->tokenCan('admin:view')) {
            $orders = $this->orderRepository->getAllOrders();

            return new OrderCollection($orders, __FUNCTION__);
        }

        return new OrderCollection([], __FUNCTION__, 'Unauthorize');
    }

    public function getApiDetailsOrder($id)
    {
        $orderDetails = $this->orderDetailRepository->showDetailsOrders($id);
        $user = Auth::user();
        if ($user->tokenCan('admin:view') || $user->id == $orderDetails[0]->order->user_id) {
            return new OrderResource($orderDetails, __FUNCTION__);
        }

        return new OrderResource([], __FUNCTION__, 'Unauthorize');
    }
}
