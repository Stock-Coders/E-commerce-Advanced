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
        $ratings = Rating::orderBy('id' , 'desc')->simplePaginate(5);
        return view('dashboard.pages.ratings.index',compact('ratings'));
    }

    public function destroy($id){
        $rating = Rating::find($id);
        $rated_product_name = $rating->product->title;
        $rating->delete();
        return redirect()->route('ratings.index')->with('successfully', "The rating with ID ($rating->id) for product ($rated_product_name) has been deleted successfully.");
    }

}
