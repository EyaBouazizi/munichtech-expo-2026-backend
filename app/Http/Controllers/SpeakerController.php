<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpeakerController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'topic' => 'required|string|max:255',
        'bio' => 'required|string',
        'photo' => 'nullable|image|max:2048',
    ]);

    $data = $request->only(['name', 'email', 'topic', 'bio']);

    // Handle file upload
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/speakers'), $filename);
        $data['photo'] = 'uploads/speakers/' . $filename;
    }

    // Store data in session (photo is now just a string path)
    $speakers = Session::get('speakers', []);
    $speakers[] = $data;
    Session::put('speakers', $speakers);

    return redirect()->back()->with('speaker_success', 'Thank you! Your speaker application has been submitted.');
}
}

