<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStoreRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index(Request $request)
    {
        $query = Ticket::query();

        if ($request->has('status') && $request->status !== '' && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('priority') && $request->priority !== '' && $request->priority !== 'all') {
            $query->where('priority', $request->priority);
        }

        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }

        $tickets = $query->orderBy('created_at', 'desc')
                        ->paginate(10);

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
