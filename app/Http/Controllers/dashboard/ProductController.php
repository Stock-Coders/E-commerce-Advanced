<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Product;
use App\Http\Controllers\Controller;
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
        //
        $products = Product::latest()->paginate(5);
        return view('dashboard.pages.products.index',compact('products'));
    }

    public function dashboardProductsSearchResult(Request $request)
    {
        $search_text_input     = $request->dashboard_search_query;
        $products_result       = Product::where('title','LIKE',"%{$search_text_input}%")->paginate(10);
        $products_result_count = $products_result->count();

        return view('dashboard.pages.products.search-products',
        compact('search_text_input', 'products_result', 'products_result_count'))
        ->with('i' , ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories    = \App\Models\Category::all();
        $subCategories = \App\Models\SubCategory::all();
        return view('dashboard.pages.products.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'              => 'required|string|max:255',
            'description'        => 'nullable|string|max:1020',
            'price'              => 'required|numeric|max:1020',
            'available_quantity' => 'required|integer|max:1020',
            'category_id'        => 'nullable|exists:categories,id',
            'sub_category_id'    => 'nullable|exists:sub_categories,id',
            'create_user_id'     => 'nullable|exists:users,id',
            'update_user_id'     => 'nullable|exists:users,id',
        ]);

        $product                     = new Product();
        $product->title              = $request->title;
        $product->description        = $request->description;
        $product->price              = $request->price;
        $product->available_quantity = $request->available_quantity;
        $product->category_id        = $request->category_id;
        $product->sub_category_id    = $request->sub_category_id;
        $product->create_user_id     = auth()->user()->id;
        $product->updated_at         = null;
        $product->save();

        return redirect()->route('products.index')->with('successfully' , "The product ($product->title)has been Created Successfully.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if($product == null){
            return view('dashboard.pages.products.404.products-404');
        }
        return view('dashboard.pages.products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
            $product = Product::find($id);
            if($product == null){
                return view('dashboard.pages.products.404.products-404');
            }
            if(auth()->user()->user_type == "admin"){
                $categories    = \App\Models\Category::all();
                $subCategories = \App\Models\SubCategory::all();
                return view('dashboard.pages.products.edit' , compact('product', 'categories', 'subCategories'));
            }
            else{
                return view('dashboard.pages.products.unauthorized.unauthorized');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
        $request->validate([
            'title'              => 'required|string|max:255',
            'description'        => 'nullable|string|max:1020',
            'price'              => 'required|numeric|max:1020',
            'available_quantity' => 'required|integer|max:1020',
            'category_id'        => 'nullable|exists:categories,id',
            'sub_category_id'    => 'nullable|exists:sub_categories,id',
            'create_user_id'     => 'nullable|exists:users,id',
            'update_user_id'     => 'nullable|exists:users,id',
        ]);
        $product_old                 = Product::find($id);
        $product                     = Product::find($id);
        $product->title = $request->title;
        if($product->title == $request->title){
            $product->title = $product->title;
        }
        else{
            $product->title = $request->title;
        }
        $product->description        = $request->description;
        $product->price              = $request->price;
        $product->available_quantity = $request->available_quantity;
        $product->category_id        = $request->category_id;
        $product->sub_category_id    = $request->sub_category_id;
        $product->update_user_id    = auth()->user()->id;
        $product->save();
        return redirect()->route('products.index')->with('successfully', "The product ($product_old->title) has Been updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        $product->updated_at = null;
        $product->save();
        return redirect()->route('products.index')->with('successfully' , "The product ($product->title) has been moved to trash successfully.");
    }

    //function Delete
    public function delete(){
        $products       = Product::latest()->onlyTrashed()->paginate(5);
        $products_count = $products->count();
        return view('dashboard.pages.products.delete', compact('products', 'products_count'));
    }
    public function restore($id){
        $product = Product::withTrashed()->find($id);
        $product->restore();
        $product = Product::findOrFail($id);
        $product->updated_at = null;
        $product->save();
        return redirect()->route('products.index')->with('successfully', "The product ($product->title) has been restored successfully.");
    }

    public function forceDelete($id){
        $product = Product::where('id', $id);
        $product->forceDelete();
        return redirect()->route('products.index')->with('successfully', "The product has been permanently deleted successfully.");
    }
}
