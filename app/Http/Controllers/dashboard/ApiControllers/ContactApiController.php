<?php

namespace App\Http\Controllers\dashboard\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactApiController extends Controller
{
    // Get All Contact Api
    public function getAllContacts(){
        $contact = Contact::with('create_user')->get();
        return response()->json($contact);
    }
    //get One Contact Api
    public function getContact($id){
        $singleContact = Contact::find($id);
        return response()->json($singleContact);
    }
    //Delete  Conatct Api
    public function deleteContact($id){
        $contact = Contact::find($id);
        $contact->delete();
        return response()->json($contact);
    }


}
