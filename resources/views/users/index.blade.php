@extends('layouts.app')

@section('title', '| All Users')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 style="font-family: 'Raleway', sans-serif;">All Users</h3>
                            </div>
                            <div>
                                <form action="/search" method="GET">
                                    <div class="input-group">
                                        <input class="form-control" type="search" placeholder="Search..." name="search">
                                        <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-search"></i> Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Read More</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="text-center">
                                        <th>{{$user->id}}</th>
                                        @if($user->id == auth()->user()->id)
                                            <td><strong><img width="20px" height="20px" style="border-radius: 50%" src="{{Gravatar::src($user->email)}}" alt=""> {{$user->name}}</strong></td>
                                            <td><strong>{{$user->email}}</strong></td>
                                            <td><strong>{{$user->role}}</strong></td>       
                                        @else 
                                            <td><small><img width="20px" height="20px" style="border-radius: 50%" src="{{Gravatar::src($user->email)}}" alt=""> {{$user->name}}</small></td>
                                            <td><small>{{$user->email}}</small></td>
                                            <td><small>{{$user->role}}</small></td>   
                                        @endif
                                        <td>
                                            <a class="btn btn-sm btn-outline-primary" href="{{route('users.show', $user->id)}}"><i class="fa fa-eye"></i> View Profile</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="ml-4">
                            <small>{{ $users->links() }}</small>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection