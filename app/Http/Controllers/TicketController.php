<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStoreRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index()
    {
        $tickets = Ticket::all();
        return TicketResource::collection($tickets);
    }

    public function store(TicketStoreRequest $request)
    {
        $ticket = Ticket::create($request->validated());
        return new TicketResource($ticket);
    }


     public function update(TicketStoreRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());
        
        return new TicketResource($ticket);

    }

    public function destroy(Ticket $Ticket)
    {
        $Ticket->delete();
        return response()->json(null, 204);
    }
}
