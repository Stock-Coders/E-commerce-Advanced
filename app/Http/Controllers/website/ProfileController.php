<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    // Show Profile
    public function showProfile($id){
        // Method (1) - poor practice
            // $user = User::findOrFail($id);
            // return view ('website.pages.user-profile.profile-show', compact('user'));

        // Method (2) - good practice
            // $user = User::findOrFail($id);
            // $loggedInUser = auth()->user()->id;
            // if($user != $loggedInUser){
            //     return abort('404');
            // }
            // else{
            //     return view ('website.pages.user-profile.profile-show', compact('user'));
            // }

        // Method (3) - best practice
            $user = User::find(auth()->user()->id);
            return view ('website.pages.user-profile.profile-show', compact('user'));
    }
    // Edit Profile
    public function editProfile($id){
            $user = User::find(auth()->user()->id);
            return view ('website.pages.user-profile.profile-edit', compact('user'));
    }

}
