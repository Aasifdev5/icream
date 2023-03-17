<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{

    public function index(){
        return view('contact');
    }

    public function upload(Request $request){
        $contact = new Contact;
        $contact->name = $request->get('name');
        $contact->email=$request->get('email');
        $contact->subject = $request->get('subject');
        $contact->message= $request->get('message');
        $contact->save();
        return redirect()->back();
    }
}
