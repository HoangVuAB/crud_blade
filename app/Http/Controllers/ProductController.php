<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ProductSearchRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\Product\ProductService;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * @param Request $request
     *
     * @return  \Illuminate\Database\Eloquent\Builder | \Illuminate\Contracts\View\Factory | \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        # code...
        $keyword = $request->input('keyword');

        $categories = Category::all();
        if (!empty($keyword)) {
            $products = $this->productService->getAllProductByName($keyword);
            return view('admin.products.search', compact('products', 'categories', 'keyword'));
        } else {
            $products = $this->productService->getAllProduct();
            return view('admin.products.index', compact('products', 'categories', 'keyword'));
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }


    /**
     * @param CreateProductRequest $request
     *
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function store(CreateProductRequest $request)

    {
        $product = $request->all();
        $this->productService->createProduct($product);
        return redirect()->route('products.index')->with('message', 'Add successfully');
    }

    /**
     * @param Product $product
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
            dd($product);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * @param Product $product
     * @param CreateProductRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Product $product, CreateProductRequest $request)
    {
        # code...
        $data = $request->all();
        $this->productService->updateProduct($product, $data);
        return redirect()->route('products.index')->with('message', 'Edit successfully');

    }

    /**
     * @param $id
     *
     * @return @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('products.index')->with('message', 'Deleted successfully');
    }

}
