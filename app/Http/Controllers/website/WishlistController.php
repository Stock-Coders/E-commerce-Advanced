<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use DB;

class WishlistController extends Controller
{
    public function addWishlist($id){
        try{
            if(auth()->user()){
                if(auth()->user()->user_type == "customer"){
                    $product               = Product::find($id);
                    $wishlist              = new Wishlist;
                    $wishlist->product_id  = $product->id;
                    $wishlist->customer_id = auth()->user()->id;
                    $wishlist->created_at  = Carbon::now()->toDateTimeString();
                    $wishlist->save();
                    return redirect()->back()
                        ->with('addWishlist_successfully' , '"'.$product->title.'" is successfully added to your wishlist.');
                }
                else{
                    if(auth()->user()->user_type == "admin"){
                        $unauth = "an (".auth()->user()->user_type;
                    }
                    else{
                        $unauth = "a (".auth()->user()->user_type;
                    }
                    return redirect()->back()
                        ->with("addWishlist_unsuccessfully", 'Your\'re unauthorized to do this action as '.$unauth.")!");
                }
            }
        }
        catch (\Exception $exception){ // the wrong condition (handle exception which is here in this case -> "duplication error")
            return redirect()->back()
                ->with('addWishlist_already_added_unsuccessfully' , '"'.$product->title.'" was already added to your wishlist!');
        }
    }

    public function clearProducts(){
        $wishlistItemsCount = Wishlist::where('customer_id', auth()->user()->id)->count();
        if($wishlistItemsCount == 0){
            return redirect()->back()->with('no_items_already_wishlist', "There are no items already in your wishlist!");
        }
        else{
            // DB::table('wishlists')->where('customer_id', auth()->user()->id)->truncate(); //here it's not available to specify a condition
            Wishlist::query()->delete(); //here it's available to specify a condition
        }
        return redirect()->route('wishlist')->with('clear_wishlistItems_successfully', "Your wishlist has been cleared successfully.");
    }

    public function destroy($id)
    {
        $customerWishlist = Wishlist::findOrFail($id);
        $product_title = $customerWishlist->product->title; //the added product (title) to the wishlist
        $customerWishlist->delete();
        return redirect()->route('wishlist')
            ->with('productDeleted_successfully' , "\"$product_title\" was successfully deleted from your wishlist.");
    }
}
