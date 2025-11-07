<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BoothController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'booth_type' => 'required|string',
        ]);

        // Store locally in session
        $booths = Session::get('booths', []);
        $booths[] = $request->all();
        Session::put('booths', $booths);

        return redirect()->back()->with('booth_success', 'Thank you! Your booth application has been submitted.');
    }
}

