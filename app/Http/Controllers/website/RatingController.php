<?php

namespace App\Http\Controllers\website;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class RatingController extends Controller
{
    public function store(Request $request){
        //Validate Rating
        $request->validate([
            'rating_level' => 'required|integer',
            'customer_id'  => 'required|exists:users,id',
            'product_id'   => 'required|exists:products,id',
        ]);

        //Store Rating
        $rating               = new Rating;
        $rating->rating_level = $request->rating_level;
        if($request->rating_level == 1)     {$rating_level_string = "Poor";}
        elseif($request->rating_level == 2) {$rating_level_string = "Average";}
        elseif($request->rating_level == 3) {$rating_level_string = "Good";}
        elseif($request->rating_level == 4) {$rating_level_string = "Very Good";}
        else                                {$rating_level_string = "Excellent";}
        $rating->email        = $request->email;
        $rating->product_id   = $request->subject;
        $rating->message      = $request->message;
        if(auth()->user()){
            if(auth()->user()->user_type == "customer"){
                $rating->customer_id = auth()->user()->id;
            }
            else{
                return redirect()->route('rating')->with("unsuccessful_rating", "Your're unauthorized to do this action.");
            }
        }
        else{
            $rating->customer_id = null;
        }
        $rating->product_id   = $request->product_id;
        $rating->created_at   = Carbon::now()->toDateTimeString();
        $rating->save();

        return redirect()->route('rating')->with("successful_rating", "Your form was submitted successfully.");
    }
}
