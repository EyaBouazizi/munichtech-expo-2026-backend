<?php

namespace App\Http\Controllers;

use App\Models\Exhibitor;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ExhibitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Exhibitor::orderBy('created_at', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'company_name' => 'required|string',
            'booth_type' => 'required|string',
            'website' => 'nullable|url',
            'contact_email' => 'nullable|email',
            'logo_url' => 'nullable|url',
            'meta' => 'nullable|array',
        ]);

        $exhibitor = Exhibitor::create($data);
        return response()->json(['success' => true, 'exhibitor' => $exhibitor], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        return response()->json(Exhibitor::findOrFail($id));
    }

}
