<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function shop(){
        $products = \App\Models\Product::all();
        return view('website.pages.products.shop', compact('products'));
    }
}
