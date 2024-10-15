<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Thesis;
use App\Assignment;
use App\User;
use Session;
use DB;
//use Request;


class AssignmentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('store', 'destroy', 'index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Assignment::paginate(10);

       // abort_unless(Gate::allows('viewAny', $assignments), 403);

        return view('assignments.index')->with('assignments', $assignments);
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
    public function store(Request $request, $id)
    {   
        $thesis = Thesis::find($id);


        $assigmnet = Assignment::firstOrCreate([                          
        //$assigmnets = new Assignment([
            'thesis_id' => $thesis->id, 
            'user_id' => auth()->id(),
            'flag'=> 0
        ]);

        //if($assigmnet){

            $assigmnet->save();

            Session::flash('success', 'You add request saccessfully');

            return redirect()->back(); 
       // }

        //else {     
       //     Session::flash('error', 'Already Assigned');

       //     return redirect()->back();
      // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignment = Assignment::find($id);
        
        return view('assignments.show')->with('assignment', $assignment);
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
        $assignment = Assignment::find($id);

        //abort_unless(Gate::allows('update', $assignment), 403);

        $thesis = Thesis::find($id);

        $assignment->update([
            'flag' => 1
        ]);

        Session::flash('success', 'Υou assigned thesis successfully!');

        return redirect()->route('assignments.index', array('assignment' => $assignment));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Assignment::find($id);

        //abort_unless(Gate::allows('delete', $assignment), 403);

        $assignment->delete();

        Session::flash('success', 'Assignment Rejected.');

       // return redirect()->route('assignments.index', array('assignment' => $assignment));
       return redirect()->back();
    }
}
