@extends('layouts.app')

@section('title', '|  Discusion')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"> 
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 style="font-family: 'Raleway', sans-serif;">Discusion</h3>
                        </div>
                        
                            <div>
                                <a href="{{route('discusions.index')}}" class="btn btn-outline-primary btn-sm my-2"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                       
                    </div>
                </div>
                <div class="card-body">  
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <img width="35px" height="35px" style="border-radius: 50%" src="{{Gravatar::src($discusion->user->email)}}" alt="">
                                <strong class="ml-1">{{$discusion->user->name}}</strong>
                            </div>
                        </div>
                        <div class="card-body">
                            <strong>Thesis Title:</strong> <span>{{$discusion->thesis->title}}</span>
                            <br>
                            <strong>Subject:</strong> <span>{{$discusion->subject}}</span>
                            <br>    
                            <strong>Info:</strong> <span>{!!$discusion->info!!}</span>                          
                        </div>
                        <div class="card-footer">
                            <span class="float-right"><small class="text-muted">{{$discusion->created_at->diffForHumans()}}</small></span>          
                        </div>    
                    </div>
                </div>
            </div>
            <br>

            <div class="card">
                <div class="card-header">
                    <div class="row ml-1">  
                        <h4 style="font-family: 'Raleway', sans-serif;">Replies</h4>
                        <span class="ml-1"><small>({{ $discusion->replies->count() }})</small></span>
                    </div>
                </div>
                <div class="card-body">
                    @foreach($discusion->replies()->paginate(5) as $reply)
                        @if($discusion->user->id == $reply->user->id)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-xs-2 col-md-1">
                                            <img src="{{Gravatar::src($discusion->user->email)}}" width="55px" height="55px" style="border-radius: 50%" alt="" /></div>
                                        <div class="col-xs-10 col-md-11">
                                        <div>
                                            <a href="{{route('users.show', $reply->user->id)}}"><strong class="ml-1">{{$reply->user->name}}</strong></a>
                                        </div>
                                        <div class="reply-text">
                                            <span>{!!$reply->content!!}</span>
                                            <span><small class="text-muted">{{$reply->created_at->diffForHumans()}}</small></span>
                                        </div>
                                        <div class="float-right">
                                            @if(Auth::user()->id == $reply->user->id)
                                                <form action="{{route('replies.destroy',array($discusion->id, $reply->id))}}" method="POST">
                                                    @csrf 
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-outline-danger btn-sm ml-1"><i class="fa fa-trash"></i> Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </li>
                            </ul>
                        @else 
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                    <div class="col-xs-2 col-md-1">
                                        <img src="{{Gravatar::src($discusion->user->email)}}" width="55px" height="55px" style="border-radius: 50%" alt="" /></div>
                                    <div class="col-xs-10 col-md-11">
                                        <div>
                                            <a href="{{route('users.show', $reply->user->id)}}"><strong class="ml-1">{{$reply->user->name}}</strong></a>
                                        </div>
                                        <div class="comment-text">
                                            <span>{!!$reply->content!!}</span>
                                            <span><small class="text-muted">{{$reply->created_at->diffForHumans()}}</small></span>
                                        </div>
                                        <div class="float-right">
                                            @if(Auth::user()->id == $reply->user->id)
                                                <form action="{{route('replies.destroy',array($discusion->id, $reply->id))}}" method="POST">
                                                    @csrf 
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-outline-danger btn-sm ml-1"><i class="fa fa-trash"></i> Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </li>
                            </ul>
                        @endif
                    @endforeach
                </div>
            </div>

            <br>        
            <div>
                <small>{{$discusion->replies()->paginate(5)->links()}}</small>
            </div>

            <br>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('replies.store', $discusion->id)}}" method="POST">                            

                        @csrf 

                        <div class="form-group">
                            <label for="content">Reply</label>
                            <input id="content" type="hidden" name="content">
                             <trix-editor input="content"></trix-editor>
                        </div>
      
                        <button class="btn btn-outline-success btn-sm" type="submit"><i class="fa fa-arrow-right"></i> Create Reply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css"> 
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection

    
