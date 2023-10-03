<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index()
    {
        //
        $ratings = Rating::latest()->simplePaginate(5);
        return view('dashboard.pages.ratings.index',compact('ratings'));
        // if($ratings->rating_level == 1)     {$rating_level_string = "Poor";}
        // elseif($ratings->rating_level == 2) {$rating_level_string = "Average";}
        // elseif($ratings->rating_level == 3) {$rating_level_string = "Good";}
        // elseif($ratings->rating_level == 4) {$rating_level_string = "Very Good";}
        // else                                {$rating_level_string = "Excellent";}
    }

    public function show($id)
    {
        $rating = Rating::find($id);
        if($rating->rating_level == 1)     {$rating_level_string = "Poor";}
        elseif($rating->rating_level == 2) {$rating_level_string = "Average";}
        elseif($rating->rating_level == 3) {$rating_level_string = "Good";}
        elseif($rating->rating_level == 4) {$rating_level_string = "Very Good";}
        else                               {$rating_level_string = "Excellent";}
        $rated_product_name = $rating->product->title;
        if($rating == null){
            return view('dashboard.pages.ratings.404.ratings-404');
        }
        return view('dashboard.pages.ratings.show', compact('rating', 'rated_product_name', 'rating_level_string'));
    }

    public function destroy($id){
        $rating = Rating::find($id);
        $rated_product_name = $rating->product->title;
        $rating->delete();
        return redirect()->route('ratings.index')->with('successfully', "The rating with ID ($rating->id) for product ($rated_product_name) has been deleted successfully.");
    }

}
