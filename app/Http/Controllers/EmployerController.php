<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'option' => 'required|string',
        ]);

        $employers = Session::get('employers', []);
        $employers[] = $request->all();
        Session::put('employers', $employers);

        return redirect()->back()->with('employer_success', 'Thank you! Your application has been submitted.');
    }
}

