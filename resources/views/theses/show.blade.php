@extends('layouts.app')

@section('title', '| View Thesis')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 style="font-family: 'Raleway', sans-serif;">Thesis</h3>
                            </div>
                            <div>
                                <a class="btn btn-outline-primary btn-sm" href="{{URL::previous()}}"><i class="fa fa-arrow-left"></i>  Back</a> 
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$thesis->title}}</h5>
                        <hr>
                        <div class="jumbotron">
                            <p>{!!$thesis->content!!} </p>
                        </div>
                        @Auth
                            <p><small style="font-weight: bold">Category:</small><small> {{$thesis->category->name}}</small></p>

                            <hr>
                            <div class="row">
                                @if(Auth::user() && Auth::user()->isAdmin())
                                    <a href="{{route('theses.edit', $thesis->id)}}" class="btn btn-outline-primary btn-sm ml-3"><i class="fa fa-edit"></i> Edit</a>
                                  
                                    <form action="{{route('theses.destroy', $thesis->id)}}" method="POST">
                                        @csrf 
                                        @method('DELETE')
        
                                        <button type="submit" class="btn btn-outline-danger btn-sm ml-2"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                @else
                                   {{-- @if($assignment->isFlaged())--}}
                                    <form action="{{route('assignments.store', $thesis->id)}}" method="POST">
                                        @csrf 
        
                                        <button type="submit" class="btn btn-outline-success btn-sm ml-2"><i class="fa fa-arrow-up"></i> Request</button>
                                    </form>
                                    {{--@endif--}}
                                @endif 

                                
                            </div>
                        @endAuth  
                    </div>
                    <div class="card-footer">
                        <img width="23px" height="23px" style="border-radius: 50%" src="{{Gravatar::src($thesis->user->email)}}" alt="">
                        <small class="text-muted ml-1">{{$thesis->user->name}}</small>  
                        <span class="float-right"><small class="text-muted">{{$thesis->created_at->diffForHumans()}}</small></span>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection


