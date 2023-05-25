<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ProductSearchRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $products = Product::with('category')->orderBy('id','desc')->paginate(20);

        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {

        //
        $productData = $request->all();
        $product = Product::create($productData);
        return redirect()->route('products.index')->with('message',"Product $product->name is added successfully!");
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {

        //
        $productData = Product::findOrFail($id);

        $categories = Category::all();
        return view('admin.products.edit',compact('productData','categories'));
    }

    /**

     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, $id)
    {

        //
        $product = Product::findOrFail($id);
        $productData = $request->all();

        $product->update($productData);
        return redirect()->route('products.index')->with('message',"Product  is changed successfully!");

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('message',"Product  is deleted successfully!");
    }

    // @param  \Illuminate\Http\Request  $request
    // * @return \Illuminate\Http\Response

    public function search(ProductSearchRequest $request) {
                $keyword = $request->input('keyword');
                $products = Product::where('name','like',"%$keyword%")->paginate(10);

                return view ('admin.products.search',compact('products'));
    }
}
