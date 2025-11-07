<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contacts = Session::get('contacts', []);
        $contacts[] = $request->all();
        Session::put('contacts', $contacts);

        return redirect()->back()->with('contact_success', 'Thank you! Your message has been sent.');
    }
}
