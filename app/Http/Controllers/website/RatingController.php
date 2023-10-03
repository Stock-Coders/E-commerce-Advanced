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
        if(auth()->user()){
            if(auth()->user()->user_type == "customer"){
                $rating->customer_id = auth()->user()->id;
            }
            else{
                return redirect()->back()->with("unsuccessful_rating", 'Your\'re unauthorized to do this action as ('.auth()->user()->user_type.").");
            }
        }
        else{
            return redirect()->back()->with("unsuccessful_rating", "Your're unauthorized to do this action.");
        }
        $rating->product_id   = $request->product_id;
        $rating->created_at   = Carbon::now()->toDateTimeString();
        $rating->save();

        return redirect()->back()->with("successful_rating", "Your rate has been added successfully.");
    }
}
