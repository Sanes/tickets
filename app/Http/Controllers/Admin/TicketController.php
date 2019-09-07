<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\Comment;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::whereIn('status', [100,101,200,201])->orderByDesc('updated_at')->get();
        // dd($tickets);
        return view('admin.ticket.index', ['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::where('id', $id)->first();
        if (!$ticket) {
            return redirect('');
        } else {
            $comments = Comment::where('ticket_id', $id)->paginate(20);
            return view('admin.ticket.show', ['ticket' => $ticket, 'comments' => $comments]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }



    public function archive()
    {
        $tickets = Ticket::where('status', [300])->orderByDesc('updated_at')->paginate(4);
        // dd($tickets);
        return view('admin.ticket.archive', ['tickets' => $tickets]);
    }

    public function setStatus (Request $request)
    {
            $ticket = Ticket::find($request['id']);
            $ticket->status = $request['status'];
            $ticket->save();
            // dd($comments);
            return redirect(route('admin.ticket.index'));
        }



    public function newest($id)
    {
        $ticket = Ticket::where('id', $id)->first();
            $query = Comment::where('ticket_id', $id)->whereNull('hidden')->orderByDesc('created_at', 'desc')->limit(20)->get();
            $comments = $query->sortBy('created_at');
            // dd($comments);
            \Session::flash('latest');
            return view('admin.ticket.show', ['ticket' => $ticket, 'comments' => $comments]);
    }

    public function latest($id)
    {
        $ticket = Ticket::where('id', $id)->first();
            $comments = Comment::where('ticket_id', $id)->whereNull('hidden')->paginate(20);
            // dd($comments);
            \Session::flash('latest');
            return redirect('/admin/ticket/show/'.$id.'?page='.$comments->lastPage());
    }
    
}



