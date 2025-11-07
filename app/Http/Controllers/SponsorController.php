<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SponsorController extends Controller
{
    public function index()
    {
        return Sponsor::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tier' => 'required|string|max:50',
            'pricing' => 'nullable|numeric',
            'benefits' => 'nullable|string',
            'logo_url' => 'nullable|url',
            'contact_email' => 'nullable|email',
            'meta' => 'nullable|array',
        ]);

        $sponsor = Sponsor::create($validated);

        return response()->json($sponsor, 201);
    }

    public function show(Sponsor $sponsor)
    {
        return $sponsor;
    }

    public function update(Request $request, Sponsor $sponsor)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'tier' => 'sometimes|required|string|max:50',
            'pricing' => 'nullable|numeric',
            'benefits' => 'nullable|string',
            'logo_url' => 'nullable|url',
            'contact_email' => 'nullable|email',
            'meta' => 'nullable|array',
        ]);

        $sponsor->update($validated);

        return response()->json($sponsor);
    }

    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();

        return response()->json(null, 204);
    }
}
