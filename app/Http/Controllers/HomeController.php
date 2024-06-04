<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        if (request("search")){
            $products = Product::where("name", "like", "%" . request("search") . "%")->get(); 
        }
        return view("index", [
            "products" => $products,
            "title" => "Home"
        ]);
    }

    public function show(Product $product)
    {
        return view("detail",[
            "title" => "Detail Product",
            "product" => $product
        ]);
    }
}
