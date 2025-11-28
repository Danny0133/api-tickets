<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStoreRequest;
use App\Models\Ticket;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index()
    {
        $tickets = Ticket::all();
        return response()->json($tickets);
    }

    public function store(TicketStoreRequest $request)
    {
        $ticket = Ticket::create($request->validated());
        return response()->json($ticket, 201);
    }


     public function update(TicketStoreRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());
        
        return response()->json($ticket, 200);

    }

    public function destroy(Ticket $Ticket)
    {
        $Ticket->delete();
        return response()->json(null, 204);
    }
}
