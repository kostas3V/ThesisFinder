<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Thesis;
use Session;
use App\Category;
use Assignment;



class ThesesController extends Controller
{


    public function __construct(){

        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('admin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theses = Thesis::orderBy('created_at', 'DESC');

        //return view('theses.index')->with('theses', $theses);
        return view('theses.index', ['theses' => Thesis::filterByCategories()->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $categories = Category::all();

        return view('theses.create')->with('categories', $categories);
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
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'description'=> 'required',
        ]);

        $thesis = new Thesis([
            'title' => $request['title'],
            'content' => $request['content'],
            'category_id' => $request['category'],
            'description' => $request['description'],
            'user_id' => auth()->id()
        ]); 

        $thesis->save();

        Session::flash('success', 'Thesis Created!');

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $thesis = Thesis::find($id);
        
        return view('theses.show')->with('thesis', $thesis);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thesis = Thesis::find($id);

        abort_unless(Gate::allows('update', $thesis), 403);

        $categories = Category::all();

        return view('theses.edit')->with('thesis', $thesis)->with('categories', $categories);     
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
        $thesis = Thesis::find($id);

        abort_unless(Gate::allows('update', $thesis), 403);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'description'=> 'required',
        ]);

        $thesis->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'category_id' => $request['category'],
            'description' => $request['description'],
        ]);

        

        Session::flash('success', 'Thesis Updated!');

        return redirect()->route('theses.show', array('thesis' => $thesis));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        
        $thesis = Thesis::find($id);

        abort_unless(Gate::allows('delete', $thesis), 403);
        
        $thesis->delete();

        Session::flash('success', 'Thesis Deleted.');

        return redirect()->route('theses.index', array('thesis' => $thesis));
    }

}
