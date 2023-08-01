<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }
  
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        return view('confirm', compact('contact'));

        if($request->input('back') == 'back'){
            return redirect('/')->withInput();
        }
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        Contact::create($contact);
        return view('thanks');
    }
}
