<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class TicketController extends Controller
{
    public function index(): JsonResponse
    {
        $tickets = Ticket::orderBy('created_at', 'desc')->paginate(25);
        return response()->json($tickets);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'type' => 'required|string',
            'price' => 'nullable|numeric',
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'meta' => 'nullable|array',
        ]);

        $ticket = Ticket::create($data);

        // TODO: send email or trigger webhook after payment confirmation
        return response()->json(['success' => true, 'ticket' => $ticket], 201);
    }

    public function show($id): JsonResponse
    {
        $ticket = Ticket::findOrFail($id);
        return response()->json($ticket);
    }
}