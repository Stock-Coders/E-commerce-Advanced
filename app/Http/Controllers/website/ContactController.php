<?php

namespace App\Http\Controllers\website;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function store(Request $request){
        //Validate Contact
        $request->validate([
            'name'        => 'required|max:1020',
            'email'       => 'required|email',
            'phone'       => 'nullable|min:11|max:11',
            'subject'     => 'required|max:1020',
            'message'     => 'required|max:1020',
            'customer_id' => 'nullable|exists:users,id',
        ]);

        //Store Contact
        $contact              = new Contact;
        $contact->name        = $request->name;
        $contact->email       = $request->email;
        $contact->subject     = $request->subject;
        $contact->message     = $request->message;
        if(auth()->user()->user_type == "customer"){
            $contact->customer_id = auth()->user()->id;
        }
        elseif(!auth()->user()){
            $contact->customer_id = null;
        }
        else{
            return redirect()->route('contact')->with("unsuccessful_contact", "Your're unauthorized to do this action.");
        }

        $contact->created_at  = Carbon::now()->toDateTimeString();;
        $contact->save();

        return redirect()->route('contact')->with("successful_contact", "Your form was submitted successfully.");
    }
}

