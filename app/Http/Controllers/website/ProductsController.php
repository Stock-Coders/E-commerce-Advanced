<?php

namespace App\Http\Controllers\website;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function shop(){
        $products = Product::all();
        return view('website.pages.products.shop', compact('products'));
    }

    public function productsSearchResult(Request $request)
    {
        $search_text_input     = $request->search_query;
        $products_result       = Product::where('title','LIKE',"%{$search_text_input}%")->get();
        $products_result_count = $products_result->count();

        return view('website.pages.products.search-products',
        compact('search_text_input', 'products_result', 'products_result_count'))
        ->with('i' , ($request->input('page', 1) - 1) * 5);
    }
}
