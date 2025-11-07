<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    // Show the ticket form
    public function create()
    {
        $tickets = [
            ['type' => 'Expo Visitor Pass', 'price' => 249],
            ['type' => 'General Pass', 'price' => 799],
            ['type' => 'Startup Pass', 'price' => 999],
            ['type' => 'Investor Pass', 'price' => 1499],
            ['type' => 'VIP Executive Pass', 'price' => 2499],
            ['type' => 'Researchers / Students / Job Seekers', 'price' => 99],
        ];

        return view('tickets.create', compact('tickets'));
    }

    // Handle form submission
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'ticket_type' => 'required|string',
        ]);

        Ticket::create($request->all());

        return redirect()->back()->with('success', 'Ticket booked successfully!');
    }
}
