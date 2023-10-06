<?php

namespace App\Http\Controllers\website;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;

class WishlistController extends Controller
{
    public function addWishlist($id){
        if(Auth::id()){
            $product               = Product::find($id);
            $wishlist              = new Wishlist;
            $wishlist->product_id  = $product->id;
            $wishlist->customer_id = auth()->user()->id;
            $wishlist->created_at  = Carbon::now()->toDateTimeString();
        }

        try{
            $wishlist->save();
            return redirect()->route('wishlist')
                ->with('addWishlist_successfully' , '"'.$product->name.'" is successfully added to your favorites!');
        }
        catch (\Exception $exception){ // the wrong condition (handle exception which is here in this case -> "duplication error")
            return redirect()->route('wishlist')
                ->with('addWishlist_already_added_unsuccessfully' , '"'.$product->name.'" was already added to your favorites!');
        }
    }

    public function destroy($id)
    {
        $customerWishlist = Wishlist::findOrFail($id);
        $product_name = $customerWishlist->product->title; //the added product (name) to the wishlist
        $customerWishlist->delete();
        return redirect()->route('wishlist')
            ->with('productDeleted_successfully' , "\"$product_name\" is successfully deleted from your wishlist!");
    }
}
