<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JobSeekerController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'role' => 'required|string|max:255',
        'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
    ]);

    // Handle CV upload
    $cvPath = null;
    if ($request->hasFile('cv')) {
        $cvPath = $request->file('cv')->store('cv_uploads', 'public'); // stores in storage/app/public/cv_uploads
    }

    $jobseekers = Session::get('jobseekers', []);
    $jobseekers[] = [
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'cv' => $cvPath, // store file path instead of UploadedFile object
    ];
    Session::put('jobseekers', $jobseekers);

    return redirect()->back()->with('job_success', 'Thank you! You have joined the Talent Pool.');
}
}

