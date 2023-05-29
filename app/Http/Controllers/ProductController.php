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
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function index(Request $request)
    {
        # code...
        $keyword = $request->input('keyword');

        $categories = Category::all();
        if (isset($keyword)) {
            $products = $this->productService->getAllProductByName($keyword)->paginate(20);
        } else {
            $products = $this->productService->getAllProduct()->paginate(20);
        }


        return view('admin.products.index', compact('products', 'categories'));
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
     * @param mixed $attribute
     * 
     *@return \Illuminate\Database\Eloquent\Model
     * 
     */
    public function store(CreateProductRequest $request)
    {
        $product = $request->all();

        $this->productService->createProduct($product);
        return redirect()->route('products.index')->with('message', 'Add successfully');

    }
    /**
     * @param mixed $id
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $productData = $this->productService->getByIdProduct($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('productData', 'categories'));
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
        return redirect()->route('products.index')->with('message', 'edit successfully');

    }
    /**
     * @param mixed $id

     * @return \Illuminate\Http\RedirectResponse   
     */

    public function destroy($id)
    {

        $this->productService->deleteProduct($id);
        return redirect()->route('products.index')->with('message', 'deleted successfully');
    }

}