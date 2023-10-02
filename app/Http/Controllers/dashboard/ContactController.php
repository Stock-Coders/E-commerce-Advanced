<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id' , 'desc')->simplePaginate(5);
        return view('dashboard.pages.contacts.index',compact('contacts'));
    }

    public function show($id){
        $contact = Contact::find($id);
        return view('dashboard.pages.contacts.show',compact('contact'));
    }

    public function destroy($id){
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('successfully', "The contact form with ID ($contact->id) has been deleted successfully.");
    }
}
