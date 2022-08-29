<?php

namespace App\Http\Controllers\Admin;

use App\Charts\OrderChart;
use App\Contracts\Repositories\OrderDetailRepository;
use App\Contracts\Repositories\OrderRepository;
use App\Contracts\Repositories\ProductAttributeRepository;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class DashboardController extends Controller
{
    public function calculatePercentage($valueThisMonth, $valueLastMonth)
    {
        if ($valueLastMonth > 0) {
            $rangeSales = $valueThisMonth / $valueLastMonth;
            $percentage = $rangeSales < 1 ? (1 - $rangeSales) * 100 : ($rangeSales - 1) * 100;
        } else if ($valueThisMonth == $valueLastMonth) {
            $percentage = 0;
        } else {
            $percentage = 100;
        }

        return $percentage;
    }

    public function dashboard(
        OrderRepository $orderRepository,
        OrderDetailRepository $orderDetailRepository,
        ProductAttributeRepository $productAttributeRepository
    ) {
        $salesThisMonth = $orderRepository
            ->whereMonth('updated_at', Carbon::now()->month)
            ->whereNull("deleted_at")
            ->whereStatus(config('const.completed'))
            ->sum('amount');
        $salesBeforeMonth = $orderRepository
            ->whereMonth('updated_at', Carbon::now()->month - 1)
            ->whereNull("deleted_at")
            ->whereStatus(config('const.completed'))
            ->sum('amount');

        $totalOrderThisMonth = $orderRepository
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $totalOrderBeforeMonth = $orderRepository
            ->whereMonth('created_at', Carbon::now()->month - 1)
            ->count();

        $customerThisMonth = $orderRepository
            ->whereMonth('created_at', Carbon::now()->month)
            ->pluck("user_id")
            ->toArray();
        $customerBeforeMonth = $orderRepository
            ->whereMonth('created_at', Carbon::now()->month - 1)
            ->pluck("user_id")
            ->toArray();

        $totalCustomerThisMonth = count(array_unique($customerThisMonth));
        $totalCustomerBeforeMonth = count(array_unique($customerBeforeMonth));

        $ratingThisMonth = Rating::whereMonth('created_at', Carbon::now()->month)
            ->count();
        $ratingBeforeMonth = Rating::whereMonth('created_at', Carbon::now()->month - 1)
            ->count();

        $percentageSales = $this->calculatePercentage($salesThisMonth, $salesBeforeMonth);
        $percentageOrders = $this->calculatePercentage($totalOrderThisMonth, $totalOrderBeforeMonth);
        $percentageCustomers = $this->calculatePercentage($totalCustomerThisMonth, $totalCustomerBeforeMonth);
        $percentageRatings = $this->calculatePercentage($ratingThisMonth, $ratingBeforeMonth);

        $order = $orderRepository
            ->whereYear('updated_at', Carbon::now()->year)
            ->whereNull("deleted_at")
            ->whereStatus(config('const.completed'))
            ->get()
            ->groupBy(
                function ($date) {
                    return (int) $date->updated_at->format('m');
                }
            )->map(
                function ($item) {
                    return array_sum($item->pluck('amount')->toArray());
                }
            )->toArray();

        $quantityProduct =
            $productAttributeRepository
            ->whereYear('updated_at', Carbon::now()->year)
            ->whereNull("deleted_at")
            ->get()
            ->groupBy(
                function ($date) {
                    return (int) $date->updated_at->format('m');
                }
            )->map(
                function ($item) {
                    return array_sum($item->pluck('quantity')->toArray());
                }
            )->toArray();

        $month = collect(
            today()->startOfMonth()->subMonths(12)->monthsUntil(today()->startOfMonth())
        )
            ->mapWithKeys(fn ($month) => [$month->month => $month->monthName])
            ->toArray();

        // initial dataset chart
        $dataForChartSales = [];
        $dataForChartQuantity = [];
        for ($i = config('const.block'); $i <= config('const.twelve'); $i++) {
            array_push($dataForChartSales, config('const.active'));
            array_push($dataForChartQuantity, config('const.active'));
        }
        $dataForChartSales = array_combine(range(config('const.block'), count($dataForChartSales)), $dataForChartSales);
        $dataForChartQuantity = array_combine(range(config('const.block'), count($dataForChartQuantity)), $dataForChartQuantity);

        $dataChartSales = array_values(array_replace($dataForChartSales, $order));
        array_unshift($dataChartSales, null);
        unset($dataChartSales[0]);
        $dataChartSales = json_encode($dataChartSales);

        $dataChartQuantity = array_values(array_replace($dataForChartQuantity, $quantityProduct));
        array_unshift($dataChartQuantity, null);
        unset($dataChartQuantity[0]);
        $dataChartQuantity = json_encode($dataChartQuantity);

        // table most product in this month
        $newProducts = Product::orderBy("id", "desc")->take(10)->get();
        $newOrders = $orderRepository->orderBy("id", "desc")->take(10)->get();

        return view(
            'admin.dashboard',
            compact(
                'salesThisMonth',
                'salesBeforeMonth',
                'totalOrderThisMonth',
                'totalOrderBeforeMonth',
                'totalCustomerThisMonth',
                'totalCustomerBeforeMonth',
                "ratingThisMonth",
                "ratingBeforeMonth",
                'percentageSales',
                'percentageOrders',
                "percentageCustomers",
                "percentageRatings",
                "dataChartSales",
                "dataChartQuantity",
                "newProducts",
                "newOrders"
            )
        );
    }

    public function chartOrder(Request $request)
    {
        return Order::whereDate("updated_at", ">=", $request->start_date)
            ->whereDate("updated_at", "<=", $request->end_date)
            ->orWhere(function ($q) use ($request) {
                $q->whereDate("created_at", ">=", $request->start_date)
                    ->whereDate("created_at", "<=", $request->end_date);
            })
            ->whereNull("deleted_at")
            ->whereStatus(config('const.completed'))
            ->get()
            ->groupBy(
                function ($date) {
                    return $date->updated_at->format('d-m-Y');
                }
            )->map(
                function ($item) {
                    return array_sum($item->pluck('amount')->toArray());
                }
            )->toArray();
    }

    public function chartProduct(Request $request)
    {
        return Product::whereDate("updated_at", ">=", $request->start_date)
            ->whereDate("updated_at", "<=", $request->end_date)
            ->orWhere(function ($q) use ($request) {
                $q->whereDate("created_at", ">=", $request->start_date)
                    ->whereDate("created_at", "<=", $request->end_date);
            })
            ->whereNull("deleted_at")
            ->get()
            ->groupBy(
                function ($date) {
                    return $date->updated_at->format('d-m-Y');
                }
            )->map(
                function ($item) {
                    $quantity = [];
                    foreach ($item as $val) {
                        $quantity[] = array_sum($val->productAttributes->pluck('quantity')->toArray());
                    }
                    return array_sum($quantity);
                }
            )->toArray();
    }
}
