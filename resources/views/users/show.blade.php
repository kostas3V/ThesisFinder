@extends('layouts.app')

@section('title', '| User Profile')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 style="font-family: 'Raleway', sans-serif;">User Profile</h3>
                            </div>
                            <div>
                                <a class="btn btn-outline-primary btn-sm" href="{{route('users.index')}}"><i class="fa fa-arrow-left"></i> Back</a> 
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card" style="width: 18rem;">
                                    <div class="d-flex justify-content-center">
                                        <img width="200px" height="200px" style="border-radius: 50%" src="{{Gravatar::src($user->email)}}" alt="">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title">{{$user->name}}</h6>
                                        <p class="card-text">{{$user->email}}</p>
                                        <p class="card-text">{{$user->role}}</p>
                                    </div>    
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="jumbotron">
                                    <p class="card-text">{!!$user->info!!}</p>
                                </div>
                            </div>
                        </div>
                  
                        @if(auth()->user()->id == $user->id)
                            <hr>
                            <div class="row">
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-outline-primary btn-sm ml-3"><i class="fa fa-edit"></i> Edit</a>
                            </div>
                        @else 
                            <hr>
                            {{--<a class="btn btn-sm btn-outline-success" href="{{route('discusions.create')}}"><i class="far fa-envelope"></i> Send Message</a>--}}
                        @endif

                    </div>
                    <div class="card-footer">
                        <span class="float-right"><small class="text-muted">{{$user->created_at->diffForHumans()}}</small></span>   
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection
