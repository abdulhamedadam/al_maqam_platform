<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Contact\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('site.pages.contact');
    }

    public function store(ContactRequest $request)
    {
        try {
            Contact::create($request->only('name','email','phone','subject','message'));
            return redirect()->route('user.contact.show')->with('success', trans('contacts.store_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
