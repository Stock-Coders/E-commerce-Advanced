<?php

namespace App\Http\Controllers\website;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class RatingController extends Controller
{
    public function addRating(Request $request, $id){
        //Validate Rating
        $request->validate([
            'rating_level' => 'required|in:1,2,3,4,5',
        ]);

        //Store Rating
        $product              = \App\Models\Product::find($id);
        $rating               = new Rating;
        $rating->rating_level = $request->rating_level;
        if($request->rating_level == 1)       {$rating_level_string = "Poor";}
        elseif($request->rating_level == 2)   {$rating_level_string = "Average";}
        elseif($request->rating_level == 3)   {$rating_level_string = "Good";}
        elseif($request->rating_level == 4)   {$rating_level_string = "Very Good";}
        elseif(($request->rating_level == 5)) {$rating_level_string = "Excellent";}
        else                                  {return abort('404');}
        if(auth()->user()){
            if(auth()->user()->user_type == "customer"){
                $rating->customer_id = auth()->user()->id;
            }
            else{
                return redirect()->back()->with("unsuccessful_rating", 'Your\'re unauthorized to do this action as ('.auth()->user()->user_type.").");
            }
        }
        else{
            return redirect()->back()->with("unsuccessful_rating", "Your're unauthorized to do this action! You must login in first to give a rating for any product.");
        }
        $rating->product_id   = $product->id;
        $rating->created_at   = Carbon::now()->toDateTimeString();
        $rating->save();

        return redirect()->back()->with("successful_rating", "You rated the product ($product->title) as \"$rating_level_string\".");
    }
}
