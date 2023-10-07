<?php

namespace App\Http\Controllers\website\ApiControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;

class WishlistApiController extends Controller
{
    //Wishlist Api Controller
    //Get All Wishlist
    public function getWishlists(){
        $wishlists = Wishlist::with('customer')->with('product')->get();
        return response()->json($wishlists);
    }
    //Get Single Api  Wishlist
        public function getWishlist($id){
            $wishlist = Wishlist::find($id);
            return response()->json($wishlist);
        }
    public function deleteWishlist($id){
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return response()->json($wishlist);
    }

}
