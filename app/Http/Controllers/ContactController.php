<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact');
    }

    public function upload(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $contact = new Contact;
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->subject = $request->get('subject');
        $contact->message = $request->get('message');
        $save = $contact->save();
        if ($save) {
            return redirect()->back()->with('success', 'We will contact you soon');
        } else {
            return redirect()->back()->with('fail', 'something wrong');
        }

    }
}