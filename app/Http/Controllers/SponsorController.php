<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SponsorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'level' => 'required|string',
        ]);

        // Store locally (optional: you can create a sponsors table later)
        $sponsors = Session::get('sponsors', []);
        $sponsors[] = $request->all();
        Session::put('sponsors', $sponsors);

        return redirect()->back()->with('sponsor_success', 'Thank you! Your sponsorship request has been submitted.');
    }
}
