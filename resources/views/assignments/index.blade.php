@extends('layouts.app')

@section('title', '| All Assignments')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"> 
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            @foreach($assignments as $assignment)
                                @once
                                    @if(auth()->user()->id !== $assignment->user_id)
                                        <h3 style="font-family: 'Raleway', sans-serif;">All Assignments</h3>
                                    @else 
                                        <h3 style="font-family: 'Raleway', sans-serif;">My Assignment</h3>
                                    @endif
                                @endonce        
                            @endforeach    
                                   
                        </div>
                            <div>
                                {{--<a href="#" class="btn btn-outline-success btn-sm my-2">button</a>--}}
                            </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No.</th>
                                <th scope="col">Thesis Name</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date</th>
                                @foreach($assignments as $assignment)
                                    @once
                                        @if(auth()->user()->id !== $assignment->user_id)
                                            <th scope="col">Accept</th>
                                            <th scope="col">reject</th>
                                        @else   
                                            <th scope="col">View Thesis</th>
                                        @endif
                                    @endonce     
                                @endforeach 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($assignments as $assignment)
                                
                                @if(auth()->user()->id == $assignment->thesis->user_id)                                                                         {{--@if(auth()->user()->id == $assignment->thesis_id)--}}
                                    <tr class="text-center">
                                        <th><small>{{$assignment->id}}</small></th>
                                        <td><small>{{$assignment->thesis->title}}</small></td>
                                        <td><small><img width="20px" height="20px" style="border-radius: 50%" src="{{Gravatar::src($assignment->user->email)}}" alt=""> {{$assignment->user->name}}</small></td>
                                        <td><small>{{$assignment->user->email}}</small></td>
                                        @if(!$assignment->isFlaged())
                                            <td></td>
                                        @else 
                                            <td><small>{{ $assignment->created_at->format('Y-m-d') }} / {{$assignment->created_at->diffForHumans()}}</small></td>
                                        @endif 
                                        
                                        <td>
                                            @if(!$assignment->isFlaged())
                                                
                                                <form action="{{route('assignments.update', $assignment->id)}}" method="POST">
                                                    @csrf 
                                                     @method('PUT')
                        
                                                    <button type="submit" class="btn btn-outline-success btn-sm ml-1"><i class="fa fa-check"></i> Accept</button>
                                                </form>     
                                            @else 
                                                <span class="text-success"><small>Assigned!</small></span>
                                            @endif       
                                        </td>
                                        <td>
                                            @if(!$assignment->isFlaged())
                                                <form action="{{route('assignments.destroy', $assignment->id)}}" method="POST">
                                                    @csrf 
                                                    @method('DELETE')
                
                                                    <button type="submit" class="btn btn-outline-danger btn-sm ml-1"><i class="fa fa-trash"></i> Reject</button>
                                                </form>
                                            @else 
                                                <form action="{{route('assignments.destroy', $assignment->id)}}" method="POST">
                                                    @csrf 
                                                    @method('DELETE')
                
                                                    <button type="submit" class="btn btn-outline-danger btn-sm ml-1"><i class="fa fa-trash"></i> Cancel</button>
                                                </form>    
                                            @endif
                                        </td>
                                    </tr>
                                @elseif(auth()->user()->id == $assignment->user_id && $assignment->isFlaged())
                                    <tr class="text-center">
                                        <th><small>{{$assignment->id}}</small></th>
                                        <td><small>{{$assignment->thesis->title}}</small></td>
                                        <td><small><img width="20px" height="20px" style="border-radius: 50%" src="{{Gravatar::src($assignment->thesis->user->name)}}" alt=""> {{$assignment->thesis->user->name}}</small></td>
                                        <td><small>{{$assignment->thesis->user->email}}</small></td>
                                        @if(!$assignment->isFlaged())
                                            <td></td>
                                        @else 
                                            <td><small>{{ $assignment->created_at->format('Y-m-d') }} / {{$assignment->created_at->diffForHumans()}}</small></td>
                                        @endif
                                        <td>
                                            {{--<a href="{{route('theses.show', $assignment->thesis->id)}}" class="btn btn-outline-primary btn-sm ml-1"><i class="fa fa-eye"></i> View Thesis</a>--}}
                                            <a href="{{route('assignments.show', $assignment->id)}}" class="btn btn-outline-primary btn-sm ml-1"><i class="fa fa-eye"></i> View Thesis</a>
                                        </td> 
                                    </tr>
                                @endif
                    
                            @endforeach
                        </tbody>
                    </table>

                    @foreach($assignments as $assignment)
                        @once
                            @if(auth()->user()->id !== $assignment->user_id)
                                <div class="ml-4">
                                    <small>{{ $assignments->links() }}</small>
                                </div>
                            @endif
                        @endonce
                    @endforeach            

                </div>
            </div>    
        </div>
    </div>
</div>
@endsection


    
