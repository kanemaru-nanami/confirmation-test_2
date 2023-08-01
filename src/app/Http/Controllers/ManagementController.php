<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ManagementController extends Controller
{
    public function index(Request $request)
    {
        $contact = $request->only(['id', 'fullname', 'gender', 'email', 'opinion']);
        $contacts = Contact::Paginate(10);
        return view('/management', compact('contacts'));
    }
  
    public function confirm(ContactRequest $request)
    {
        
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['id', 'fullname', 'gender', 'email', 'opinion']);
        Contact::view($contact);

        return redirect('management');
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/');
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('contact')->FullnameSearch($request->fullname)->GenderSearch($request->gender)->Created_atSearch($request->created_at)->EmailSearch($request->email)->get();

        return redirect('management', compact('contacts'));
    }
}
