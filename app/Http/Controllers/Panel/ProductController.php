<?php

namespace App\Http\Controllers\Panel;

use App\Models\Product;

class ProductController
{
    public function index()
    {
//        $products = Product::all()->load('cities');
        $products = Product::with('cities')->get();
        return view('panel.products', compact('products'));
    }

}
