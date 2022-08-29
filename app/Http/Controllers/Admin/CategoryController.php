<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num = config('const.block');
        $categories = $this->categoryRepository->paginate(config('const.pagination'));

        return view('admin.category.index', compact(['categories', 'num']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->whereParent(config('const.active'))
            ->with('childrenCategory')
            ->get();

        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $slug = Str::slug($request->name);

        $this->categoryRepository->create(
            [
                'name' => $request->name,
                'slug' => $slug,
                'parent' => $request->parent,
            ]
        );

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = $this->categoryRepository->whereParent(config('const.active'))
            ->with('childrenCategory')
            ->get();
        $category = $this->categoryRepository->whereSlug($slug)->with('childrenCategory')->first();

        return view('admin.category.update', compact(['categories', 'category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Category     $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $slug)
    {
        $category = $this->categoryRepository->whereSlug($slug)->first();
        $slug = Str::slug($request->name);

        $category->update(
            [
                'name' => $request->name,
                'slug' => $slug,
                'parent' => $request->parent,
            ]
        );

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            $category = Category::findOrFail($request->id);
            $parentCategory = $this->categoryRepository
                ->whereId($category->parent)
                ->first();

            if ($parentCategory) {
                $this->categoryRepository
                    ->whereIn('id', $category->childrenCategory->pluck('id')->toArray())
                    ->update([
                        'parent' => $parentCategory->id,
                    ]);
            } else {
                $this->categoryRepository
                    ->whereIn('id', $category->childrenCategory->pluck('id')->toArray())
                    ->update([
                        'parent' => config('const.active'),
                    ]);
            }

            $productIds = $category->products->pluck('id')->toArray();
            $products = Product::whereIn('id', $productIds)->get();
            foreach($products as $product) {
                if ($product->orderDetails->count() > 0) {
                    return false;
                }
            };
            ProductAttribute::whereIn('product_id', $productIds)->delete();
            ProductImage::whereIn('product_id', $productIds)->delete();
            Product::whereIn('id', $productIds)->delete();

            $category->delete();

            DB::commit();

            return response()->json([
                "data" => $category
            ]);
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }
    }
}
