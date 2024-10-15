<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use App\Discusion;
use App\User;
use Session;

class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, Discusion $discusion)
    {   
        //$inbox = Inbox::find($id);

        $request->validate([
            'content' => 'required'
        ]);

        auth()->user()->replies()->create([

            'content' => $request->content,
            'discusion_id' => $discusion->id,
        ]);

        Session::flash('success', 'Reply Created!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Discusion $discusion, $id)
    {
        $reply = Reply::find($id);

        return view('replies.edit')->with('reply', $reply);  
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
    public function destroy(Discusion $discusion, $id)
    {
        
        $reply = Reply::find($id);

        $reply->delete();

        Session::flash('success', 'Reply deleted.');

        return redirect()->back();
    }
}
