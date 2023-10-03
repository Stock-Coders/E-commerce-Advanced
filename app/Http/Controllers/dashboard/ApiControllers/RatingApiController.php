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
        $ratings = Rating::with('create_user')->get();
        return response()->json($ratings);
    }

    public function destroy($id){
        $rating = Rating::find($id);
        $rating->delete();
        return response()->json($ratings);
    }

}
