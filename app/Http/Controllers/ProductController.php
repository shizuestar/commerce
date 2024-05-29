<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.products.index", [
            "title" => "products",
            "products" => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.products.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required",
            "price" => "required",
            "stock" => "required",
            "description" => "required",
        ]);
        
        Product::create($validateData);

        return redirect("/dashboard/products")->with("succes", "Product successful added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("dashboard.products.edit", [
            "title" => "Edit Product",
            "product" => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            "name" => "required",
            "price" => "required",
            "stock" => "required",
            "description" => "required"
        ]);

        Product::where("id", $product->id)->update($validateData);

        // succes
        return   redirect("/dashboard/products")->with("succes", "Your Product has ben Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);

        return redirect("/dashboard/products")->with("succes", "Your Product has been deleted!");
    }
}
