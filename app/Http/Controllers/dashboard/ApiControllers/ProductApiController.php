<?php

namespace App\Http\Controllers\dashboard\ApiControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductApiController extends Controller
{
    //Get All Api Products
    public function getProducts(){
        // $products = Product::all();

        $products = Product::with('create_user')->with('update_user')
            ->with('category')->with('subCategory')->get();

        return response()->json($products);
    }

    //Get ALL Delete Products Api
    public Function getDeletedProducts(){
        $AllDeletedProducts = Product::onlyTrashed()->get();
        return response()->json($AllDeletedProducts);
    }

    //Get Single Products Api
    public function getProduct($id){
        $singleProduct = Product::find($id);
        return response()->json($singleProduct);
    }

    //Save New Product Api
    public function storeProduct(Request $request){
        $request->validate([
            'title'                 => 'Required|string|unique:sub_categories,title|max:255',
            'description'           => 'nullable|string|max:1020',
            'price'                 => 'required|numeric||string|max:1020',
            'available_quantity'    => 'required|integer|string|max:1020',
            'category_id'           => 'nullable|exists:categories,id',
            'sub_category_id'       => 'nullable|exists:sub_categories,id',
            'create_user_id'        => 'nullable|exists:users,id',
            'update_user_id'        => 'nullable|exists:users,id',
        ]);
            $product = Product::create($request->all());
            return response()->json($product);
    }

    //Update Product Api
        public function updateProduct(Request $request , $id){
            $product = Product::find($id);
            $product->update($request->all());
            return response()->json($product);
        }

    //delete Product Api
        public function deleteProduct($id){
            $deleteProduct  = Product::findOrFail($id);
            $deleteProduct->delete();
            $deleteProduct->update_at = null;
            $deleteProduct->save();
            return response()->json($deleteProduct);
        }
    //Restore Product Api
        public function restoreProduct($id){
            $restoreProduct = Product::withTrashed()->find($id);
            $restoreProduct->restore();
            $restoreProduct->update_at = null;
            $restoreProduct->save();
            return response()->json($restoreProduct);
        }

    //ForceDelete Product Api
        public function forceDeleteProduct($id){
            $forceDeleteProduct = Product::where('id' , $id)->whereNotNull('deleted_at');
            if($forceDeleteProduct){
                $forceDeleteProduct->forceDelete();
                return response()->json($forceDeleteProduct);
            }
            else{
                return response()->json();
            }
        }

}
