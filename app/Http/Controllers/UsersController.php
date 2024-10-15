<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use Session;


class UsersController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index')->with('users', $users);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = User::find($id);

        return view('users.show')->with('user', $user);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        abort_unless(Gate::allows('update', $user), 403);

        return view('users.edit')->with('user', $user);
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
        $user = User::find($id);

        abort_unless(Gate::allows('update', $user), 403);

        $request->validate([
            'name' => 'required',
            
        ]);

        $user->update([
            'name' => $request['name'],
            'info' => $request['info'],

        ]);

        Session::flash('success', 'Profile Updated!');

        return redirect()->route('users.show', array('user' => $user));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $user = User::find($id);

        abort_unless(Gate::allows('delete', $user), 403);

        $user->delete();

        Session::flash('success', 'User Deleted.');

        return redirect()->route('users.index', array('users' => $users));
    }


    public function search(Request $request){

        $search = $request->get('search');
        $users = User::where('name', 'like', '%'.$search.'%')->paginate(10);

        return view('users.index')->with('users', $users);
    }

}
