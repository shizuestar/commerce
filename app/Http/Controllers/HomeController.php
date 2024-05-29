<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view("index", [
            "products" => Product::all(),
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