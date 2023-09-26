<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // Home Page
    public function home(){
        return view('website.pages.home');
    }
    //About Page
    public function about(){
        return view('website.pages.about');
    }
    //Contact Page
    public function contact(){
        return view('website.pages.contact');
    }
    //Card Page
    public function cart(){
        return view('website.pages.cart');
    }
    //Profile Page
    public function profile(){
        return view('website.pages.profile');
    }
    //search page
    public function search(){
        return view('website.pages.search');
    }
    //wishlist page
    public function wishlist(){
        return view('website.pages.wishlist');
    }
    //thankyou Page
    public function thankYou(){
        return view('website.pages.thank-you');
    }
    //checkout page
    public function checkout(){
        return view('website.pages.checkout');
    }
     //category page
     public function category(){
        return view('website.pages.category');
    }

}
