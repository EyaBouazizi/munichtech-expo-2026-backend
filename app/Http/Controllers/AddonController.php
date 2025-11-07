<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddonController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'addon_type' => 'required|string',
        ]);

        $addons = Session::get('addons', []);
        $addons[] = $request->all();
        Session::put('addons', $addons);

        return redirect()->back()->with('addon_success', 'Thank you! Your add-on booking has been submitted successfully.');
    }
}
