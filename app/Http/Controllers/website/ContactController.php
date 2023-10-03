<?php

namespace App\Http\Controllers\website;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function store(Request $request){
        //Validate Contact
        $request->validate([
            'name' => function ($request) {
                if (!Auth::id()) {
                    return ['required'];
                }
                else{
                    return ['nullable'];
                }
            },
            'email'       => 'required|email',
            'phone'       => 'nullable|min:11|max:11',
            'subject'     => 'required|max:255',
            'message'     => 'required|max:1020',
            'customer_id' => 'nullable|exists:users,id',
        ]);

        //Store Contact
        $contact              = new Contact;
        $contact->name        = $request->name;
        $contact->email       = $request->email;
        $contact->subject     = $request->subject;
        $contact->message     = $request->message;
        if(auth()->user()){
            if(auth()->user()->user_type == "customer"){
                $contact->customer_id = auth()->user()->id;
            }
            else{
                return redirect()->route('contact')->with("unsuccessful_contact", "Your're unauthorized to do this action.");
            }
        }
        else{
            $contact->customer_id = null;
        }
        $contact->created_at  = Carbon::now()->toDateTimeString();;
        $contact->save();

        return redirect()->route('contact')->with("successful_contact", "Your form was submitted successfully.");
    }
}

