<?php

namespace App\Http\Controllers\dashboard\ApiControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rating;

class RatingApiController extends Controller
{
    //Rating Api Controller
    //Get All Rating
    public function getRatings(){
        $ratings = Rating::with('customer')->get();
        return response()->json($ratings);
    }

    public function deleteRating($id){
        $rating = Rating::find($id);
        $rating->delete();
        return response()->json($ratings);
    }

}
