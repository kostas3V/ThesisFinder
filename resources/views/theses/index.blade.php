@extends('layouts.app')

@section('title', '| All Theses')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"> 
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 style="font-family: 'Raleway', sans-serif;">All Theses</h3>
                        </div>
                        @if(Auth::user() && Auth::user()->isAdmin())
                            <div>
                                <a href="{{route('theses.create')}}" class="btn btn-outline-success btn-sm my-2"><i class="fas fa-pen"></i> Create New Thesis</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if(Auth::user() && Auth::user()->isAdmin())
                            @foreach($theses as $thesis)
                                @if(auth()->user()->id == $thesis->user_id)
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <img width="35px" height="35px" style="border-radius: 50%" src="{{Gravatar::src($thesis->user->email)}}" alt="">
                                                    <strong class="ml-1">{{$thesis->user->name}}</strong>
                                                    <span class="ml-1"><small>({{ $thesis->user->theses->count() }})</small></span>
                                                </div>
                                                <div>
                                                    @if(!$thesis->isLocked()) 
                                                        <span class="text-success"><small><i class="fas fa-lock-open"></i> OPEN</small></span> 
                                                    @else 
                                                        <span class="text-danger"><small><i class="fas fa-lock"></i> CLOSED</small></span>
                                                    @endif    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title text-center">{{$thesis->title}}</h5>
                                            <hr>
                                            <div class="jumbotron">
                                                <p class="text-left">{{substr(strip_tags($thesis->content), 0, 400)}} {{strlen(strip_tags($thesis->content)) > 400 ? "..." : ""}}</p>   {{--με τη χρήση strip_tags αφαιρούμε τα tags <h1>thesis</h1> ==> thesis επίσης μας προστατεύει από κακόβουλα scripts --}}
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <a href="{{route('theses.show', $thesis->id)}}" class="btn btn-outline-info btn-sm"><i class="fas fa-info-circle"></i> Read More</a>
                                                </div>
                                                <div>
                                                    <span class="float-right"><small class="text-muted">{{$thesis->created_at->diffForHumans()}}</small></span>
                                                </div>
                                            </div> 
                                        </div>
                                    </div> 
                                    <br>
                                @endif
                            @endforeach   
                    @else 
                        @foreach($theses as $thesis)
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <img width="35px" height="35px" style="border-radius: 50%" src="{{Gravatar::src($thesis->user->email)}}" alt="">
                                            <strong class="ml-1">{{$thesis->user->name}}</strong>
                                            <span class="ml-1"><small>({{ $thesis->user->theses->count() }})</small></span>
                                        </div>
                                        <div>
                                            @if(!$thesis->isLocked()) 
                                                <span class="text-success"><small><i class="fas fa-lock-open"></i> OPEN</small></span> 
                                            @else 
                                                <span class="text-danger"><small><i class="fas fa-lock"></i> CLOSED</small></span>
                                            @endif    
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{$thesis->title}}</h5>
                                    <hr>
                                    <div class="jumbotron">
                                        <p class="text-left">{{substr(strip_tags($thesis->content), 0, 400)}} {{strlen(strip_tags($thesis->content)) > 400 ? "..." : ""}}</p>   {{--με τη χρήση strip_tags αφαιρούμε τα tags <h1>thesis</h1> ==> thesis επίσης μας προστατεύει από κακόβουλα scripts --}}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            @if($thesis->isLocked())
                                                <span class="text-danger"><small><i class="fas fa-lock"></i> CLOSED</small></span>
                                            @else 
                                                <a href="{{route('theses.show', $thesis->id)}}" class="btn btn-outline-info btn-sm"><i class="fas fa-info-circle"></i> Read More</a>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="float-right"><small class="text-muted">{{$thesis->created_at->diffForHumans()}}</small></span>
                                        </div>
                                    </div> 
                                </div>
                            </div> 
                            <br>
                        @endforeach
                    @endif    
                </div>
                
                <div class="ml-4">
                    <small>{{$theses->appends(array('category' => request()->query('category')))->links()}}</small>
                </div> 

            </div>
            <div>
            <button onclick="topFunction()" id="myBtn" title="Go top" class="btn btn-outline-secondary btn-sm" ><i class="fas fa-chevron-up"></i></button>
            </div>
            
           
            <style>
                #myBtn {
                    display: none;/* Hidden by default */
                    position: fixed;/* Fixed/sticky position */
                    bottom: 20px;/* Place the button at the bottom of the page */
                    right: 380px;/*  Place the button 30px from the right */ 
                    cursor: pointer; /* Add a mouse pointer on hover */ 
                }
            </style>
            <script>
                mybutton = document.getElementById("myBtn");

                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {scrollFunction()};

                function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        mybutton.style.display = "block";
                    } else {
                        mybutton.style.display = "none";
                    }
                }

                // When the user clicks on the button, scroll to the top of the document
                function topFunction() {
                    document.body.scrollTop = 0; // For Safari
                    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                }
            </script>
        </div>
    </div>
</div>
@endsection




    
