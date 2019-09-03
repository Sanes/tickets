<?php

namespace App\Http\Controllers\Customer;

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
        $userId = auth()->user()->id;
        $tickets = Ticket::where('user_id', $userId)->whereIn('status', [100,101,201,200])->orderByDesc('status')->orderByDesc('updated_at')->paginate(20);
        // dd($tickets);
        return view('customer.ticket.index', ['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = strip_tags($request->title);
        $description = strip_tags($request->description, '<a><br><b><u><i><strong>');
        $ticket = new Ticket;
        $ticket->title = $title;
        $ticket->description = $description;
        $ticket->status = 100;
        $ticket->user_id = auth()->user()->id;
        $ticket->save();
        $id = $ticket->id;
        return redirect('/customer/ticket/show/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$userId = auth()->user()->id;
        $ticket = Ticket::where('id', $id)->where('user_id', $userId)->first();
        if (!$ticket) {
        	return redirect('/404');
        } else {
            $comments = Comment::where('ticket_id', $id)->whereNull('hidden')->paginate(20);
            // dd($comments);
        	return view('customer.ticket.show', ['ticket' => $ticket, 'comments' => $comments]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }






    public function archive()
    {
        $userId = auth()->user()->id;
        $tickets = Ticket::where('user_id', $userId)->whereIn('status', [300])->orderBy('status')->orderByDesc('updated_at')->paginate(4);
        // dd($tickets);
        return view('customer.ticket.archive', ['tickets' => $tickets]);
    }




    public function newest($id)
    {
        $userId = auth()->user()->id;
        $ticket = Ticket::where('id', $id)->where('user_id', $userId)->first();
        if (!$ticket) {
            return redirect('/404');
        } else {
            $query = Comment::where('ticket_id', $id)->whereNull('hidden')->orderByDesc('created_at', 'desc')->limit(20)->get();
            $comments = $query->sortBy('created_at');
            // dd($comments);
            \Session::flash('latest');
            return view('customer.ticket.show', ['ticket' => $ticket, 'comments' => $comments]);
        }
    }

    public function latest($id)
    {
        $userId = auth()->user()->id;
        $ticket = Ticket::where('id', $id)->where('user_id', $userId)->first();
        if (!$ticket) {
            return redirect('/404');
        } else {
            $comments = Comment::where('ticket_id', $id)->whereNull('hidden')->paginate(20);
            // dd($comments);
            \Session::flash('latest');
            return redirect('/customer/ticket/show/'.$id.'?page='.$comments->lastPage());
        }
    }


    public function setStatus (Request $request)
    {
        $userId = auth()->user()->id;
        $ticket = Ticket::where('id', $request['id'])->where('user_id', $userId)->first();
        if (!$ticket) {
            return redirect('/404');
        } else {
            $ticket = Ticket::find($request['id']);
            $ticket->status = $request['status'];
            $ticket->save();
            // dd($comments);
            return redirect(route('customer.ticket.index'));
        }
    }
}
