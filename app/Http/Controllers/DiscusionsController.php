<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discusion;
use App\Thesis;
use App\User;
use Session;
use Illuminate\Support\Facades\Hash;
use Auth;



class DiscusionsController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
        $this->middleware('admin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discusions = Discusion::paginate(10);

        return view('discusions.index')->with('discusions', $discusions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theses = Thesis::all();

        return view('discusions.create')->with('theses', $theses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'thesis' => 'required',
            'subject' => 'required',
            'info' => 'required',

            'password' => 'required',
        
        ]);
       
        $discusion = new Discusion([
            'subject' => $request['subject'],
            'info' => $request['info'],
            'thesis_id' => $request['thesis'],
            'user_id' => auth()->id(),

            'password' =>  Hash::make($request->password)
        ]); 

        $discusion->save();
    
        Session::flash('success', 'Discusion Created!');

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {   
        if(!Auth::user()->isAdmin()){

            $password=$request->get('password');

            if ($password == true)
            {     
                $discusion = Discusion::find($id);
                return view('discusions.show')->with('discusion', $discusion);   
            }
            else 
            {
                Session::flash('error', 'Password  Required!');
                return redirect()->back();
            }
        }   
        else{

            $discusion = Discusion::find($id);
            return view('discusions.show')->with('discusion', $discusion);
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
        $discusion = Discusion::find($id);
        $theses = Thesis::all();

        return view('discusions.edit')->with('discusion', $discusion)->with('theses', $theses);  
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
        $discusion = Discusion::find($id);

        $request->validate([
            'thesis' => 'required',
            'subject' => 'required',
            'info' => 'required',
            'password' => 'required',
        ]);

        $discusion->update([
            'subject' => $request['subject'],
            'info' => $request['info'],
            'thesis_id' => $request['thesis'],
            'user_id' => auth()->id(),
            'password' =>  Hash::make($request->password)
        ]);

        

        Session::flash('success', 'Discusion Updated!');

        return redirect()->route('discusions.show', array('discusion' => $discusion));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discusion = Discusion::find($id);

        $discusion->delete();

        Session::flash('success', 'Discusion deleted.');

        return redirect()->back();
    }

}
