@extends('layouts.app')

@section('title', '| My Thesis')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 style="font-family: 'Raleway', sans-serif;">My Thesis</h3>
                            </div>
                            <div>
                                <a class="btn btn-outline-primary btn-sm" href="{{route('assignments.index')}}"><i class="fa fa-arrow-left"></i>  Back</a> 
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$assignment->thesis->title}}</h5>
                        <hr>
                        <div class="jumbotron">
                            <p>{!!$assignment->thesis->content!!} </p>
                        </div>

                        <p><small style="font-weight: bold">Category:</small><small> {{$assignment->thesis->category->name}}</small></p>

                        <hr>
                    </div>
                    <div class="card-footer">
                        <img width="23px" height="23px" style="border-radius: 50%" src="{{Gravatar::src($assignment->thesis->user->email)}}" alt="">
                        <small class="text-muted ml-1">{{$assignment->thesis->user->name}}</small>  
                        <span class="float-right"><small class="text-muted">{{$assignment->thesis->created_at->diffForHumans()}}</small></span>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection


