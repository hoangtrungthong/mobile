<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\ColorRepository;
use App\Contracts\Repositories\MemoryRepository;
use App\Contracts\Repositories\ProductAttributeRepository;
use App\Contracts\Repositories\ProductImageRepository;
use App\Contracts\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateNewProductRequest;
use App\Models\ProductAttribute;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public $productRepository;

    public $categoryRepository;

    public $colorRepository;

    public $memoryRepository;

    public $productAttributeRepository;

    public $productImageRepository;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        ColorRepository $colorRepository,
        MemoryRepository $memoryRepository,
        ProductAttributeRepository $productAttributeRepository,
        ProductImageRepository $productImageRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->colorRepository = $colorRepository;
        $this->memoryRepository = $memoryRepository;
        $this->productAttributeRepository = $productAttributeRepository;
        $this->productImageRepository = $productImageRepository;
    }
    
    public function calculatePrice(
        int $oldPrice,
        int $oldQuantity,
        int $newPrice,
        int $newQuantity
    ) {
        $price = 0;
        if ($oldPrice < $newPrice) {
           
            $price = $newPrice + (($oldPrice * $oldQuantity) + ($newPrice * $newQuantity)) / ($oldQuantity + $newQuantity);
        } else {
            $price = $oldPrice + ($oldPrice * 30) / 100;
        }
       
        return  $price;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num = config('const.block');
        $products = $this->productRepository->getAllProduct();

        return view('admin.products.index', compact(['products', 'num']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->all();
        $colors = $this->colorRepository->all();
        $memories = $this->memoryRepository->all();

        return view(
            'admin.products.create',
            compact(
                [
                    'categories',
                    'colors',
                    'memories',
                ]
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->only(['category_id', 'name', 'content', 'specifications']);
            $data['slug'] = Str::slug($request->name);
            $color = $request->color_id;
            $memory = $request->memory_id;
            $price = $request->price;

            $product = $this->productRepository->create($data);
            if (!$product) {
                return redirect()->back()->withErrors('error');
            }

            foreach ($request->quantity as $key => $item) {
                $dataForInsert[] = [
                    'product_id' => $product->id,
                    'quantity' => $item,
                    'color_id' => $color[$key],
                    'memory_id' => $memory[$key],
                    'price' => $price[$key],
                    'export_price' => $this->calculatePrice(0, 0, $price[$key], $item)
                ];
            };

            $this->productAttributeRepository->insert($dataForInsert);

            foreach ($request->images as $file) {
                $img = uploadFile('images', config('path.PRODUCT_UPLOAD_PATH'), $request, $file);
                $imgsInsert[] =  [
                    'product_id' => $product->id,
                    'path' => $img,
                ];
            }

            $this->productImageRepository->insert($imgsInsert);

            DB::commit();

            return redirect()->route('admin.products.index')->withSuccess('Success');
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = $this->productRepository->getDetailProduct($slug);

        return view('admin.products.details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = $this->categoryRepository->all();
        $colors = $this->colorRepository->all();
        $memories = $this->memoryRepository->all();
        $product = $this->productRepository->whereSlug($slug)->with(
            [
                'category',
                'productAttributes',
                'productImages'
            ]
        )->firstOrFail();

        return view(
            'admin.products.edit',
            compact(
                [
                    'product',
                    'categories',
                    'colors',
                    'memories'
                ]
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Product      $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            DB::beginTransaction();

            $data = $request->only(['category_id', 'name', 'content', 'specifications']);
            $data['slug'] = Str::slug($request->name);

            $product->update($data);
            if (!$product->update($data)) {
               return redirect()->back();
            }

            $ids = $product->productAttributes->pluck('id')->toArray();
            foreach ($request->quantity as $key => $item) {
                $product->productAttributes()
                    ->where('id', $ids[$key])
                    ->update(
                        [
                            'quantity' => $item,
                            'color_id' => $request->color_id[$key],
                            'memory_id' => $request->memory_id[$key],
                            'price' => $request->price[$key],
                        ]
                    );
            };

            if ($request->images) {
                foreach ($request->images as $file) {
                    $img = uploadFile('images', config('path.PRODUCT_UPLOAD_PATH'), $request, $file);
                    $product->productImages()->updateOrCreate(
                        [
                            'path' => $img,
                        ]
                    );
                }
            }

            DB::commit();

            return redirect()->route('admin.products.index');
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }
    }
    
    public function updateNew(UpdateNewProductRequest $request, Product $product)
    {
        try {
            DB::beginTransaction();
            $dataForInsert = [];
            foreach ($product->productAttributes as $item) {
                $oldPrice[] = $item->price;
                $oldQuantity[] = $item->quantity;
            }
            
            foreach ($request->quantity as $key => $item) {
                $productAttr = $product->productAttributes()
                    ->where("color_id", $request->color_id[$key])
                    ->where("memory_id", $request->memory_id[$key])
                    ->first();

                if ($productAttr) {
                    $productAttr->update(
                        [
                            'quantity' => $productAttr->quantity + $item,
                            'price' => $request->price[$key],
                            'export_price' => $this->calculatePrice($oldPrice[$key], $oldQuantity[$key], $request->price[$key], $item),
                            'updated_at' => Carbon::now(),
                        ]
                    );
                } else {
                    $dataForInsert[] = [
                        'product_id' => $product->id,
                        'quantity' => $item,
                        'color_id' => $request->color_id[$key],
                        'memory_id' => $request->memory_id[$key],
                        'price' => $request->price[$key],
                        'export_price' => $this->calculatePrice(0, 0, $request->price[$key], $item),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                }
            };
            
            $this->productAttributeRepository->insert($dataForInsert);
            
            DB::commit();

            return redirect()->route('admin.products.index');
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $this->productRepository->deleteProduct($id);

            DB::commit();

            return redirect()->route('admin.products.index');
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }
    }

    public function search(Request $request)
    {
        $num = config('const.block');

        $products = $this->productRepository->WhereHas(
            'productAttributes',
            function ($query) use ($request) {
                $query->where('price', 'like', $request->key);
            }
        )
            ->orWhere('name', 'like', '%' . $request->key . '%')
            ->orderBy('id', 'desc')
            ->paginate(config('const.pagination'));

        if (Auth::user()) {
            if (Auth::user()->role_id == config('const.admin')) {
                return view('admin.search', compact('products', 'num'));
            }
        }

        return view('search', compact('products'));
    }

    public function continueAdd($slug)
    {
        $colors = $this->colorRepository->all();
        $memories = $this->memoryRepository->all();
        $product = $this->productRepository->whereSlug($slug)->firstOrFail();

        return view(
            'admin.products.continueAdd',
            compact(
                [
                    'product',
                    'colors',
                    'memories'
                ]
            )
        );
    }
}