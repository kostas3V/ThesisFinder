@extends('layouts.app')

@section('title', '| All Discusions')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"> 
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 style="font-family: 'Raleway', sans-serif;">All Discusions</h3>
                        </div>
                        @if(Auth::user() && Auth::user()->isAdmin())
                            <div>
                                <a href="{{route('discusions.create')}}" class="btn btn-outline-success btn-sm my-2"><i class="fas fa-pen"></i> Create New Discusion</a>
                            </div>
                        @endif    
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No.</th>
                                @if(Auth::user() && !Auth::user()->isAdmin())
                                    <th scope="col">User Name</th>
                                @endif
                                <th scope="col">Thesis Title</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Date</th>
                                @if(Auth::user() && !Auth::user()->isAdmin())
                                    <th scope="col">Action</th>
                                    <th scope="col">Password</th>
                                @endif
                                @if(Auth::user() && Auth::user()->isAdmin())
                                    <th scope="col">Read More</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($discusions as $discusion)
                                @if(Auth::user() && Auth::user()->isAdmin())
                                    @if(auth()->user()->id == $discusion->user_id) 
                                        <tr class="text-center">
                                            <th><small>{{$discusion->id}}</small></th>
                                            <td><small>{{$discusion->thesis->title}}</small></td>
                                            <td><small>{{substr(strip_tags($discusion->subject), 0, 10)}} {{strlen(strip_tags($discusion->subject)) > 10 ? "..." : ""}}</small></td>
                                            <td><small>{{ $discusion->created_at->format('Y-m-d') }}</small></td>
                                            <td>
                                                <a href="{{route('discusions.show', $discusion->id)}}" class="btn btn-sm btn-outline-info"><i class="fas fa-info-circle"></i> Read More</a>    
                                            </td>
                                            <td>
                                                <a href="{{route('discusions.edit', $discusion->id)}}" class="btn btn-sm btn-outline-primary ml-1"><i class="fa fa-edit"></i> Edit</a> 
                                            </td>
                                            <td>
                                                <form action="{{route('discusions.destroy', $discusion->id)}}" method="POST">
                                                    @csrf 
                                                    @method('DELETE')
                    
                                                    <button type="submit" class="btn btn-outline-danger btn-sm ml-1"><i class="fa fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>    
                                    @endif
                                @else 
                                    <tr class="text-center">
                                        <th><small>{{$discusion->id}}</small></th>
                                        <td>
                                            <small><img width="20px" height="20px" style="border-radius: 50%" src="{{Gravatar::src($discusion->user->email)}}" alt=""> {{$discusion->user->name}}</small>
                                        </td>
                                        <td><small>{{$discusion->thesis->title}}</small></td>
                                        <td><small>{{substr(strip_tags($discusion->subject), 0, 10)}} {{strlen(strip_tags($discusion->subject)) > 10 ? "..." : ""}}</small></td>
                                        <td><small>{{ $discusion->created_at->format('Y-m-d') }}</small></td>
                                        <td>
                                            <form method="POST" action="{{route('discusions.show', $discusion->id)}}">
                                                @csrf
                                                @method('GET')

                                                <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> 
                                        </td>
                                        <td>       
                                                <button type="submit" class="btn btn-sm btn-outline-info"><i class="fas fa-info-circle"></i> Read More</button>
                                            </form>
                                        </td>
                                    </tr>           
                                @endif 
                            @endforeach             
                    </table>    
                </div>
                <div class="ml-4">
                    <small>{{ $discusions->links() }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
