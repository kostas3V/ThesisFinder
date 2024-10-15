@extends('layouts.app')

@section('title', '| Create Discusion')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 style="font-family: 'Raleway', sans-serif;">Create Discusion</h3>
                            </div>
                            <div>
                                <a class="btn btn-outline-primary btn-sm" href="{{route('discusions.index')}}"><i class="fa fa-arrow-left"></i> Back</a> 
                            </div>
                        </div>
                       
                    </div>
                    <div class="card-body">
                        <form action="{{route('discusions.store')}}" method="POST">                            

                            @csrf 
                            
                            <div class="form-group">
                                <label for="thesis">Thesis Title</label>
                                <select name="thesis" id="thesis" class="form-control">
                                    @foreach($theses as $thesis)
                                        @if($thesis->user->id == auth()->user()->id)
                                            <option value="{{$thesis->id}}">{{$thesis->title}}</option>
                                        @endif      
                                    @endforeach
                                </select>
                            </div>  

                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>
        
                            <div class="form-group">
                                <label for="info">Info</label>
                                <input id="info" type="hidden" name="info">
                                 <trix-editor input="info"></trix-editor>
                            </div>


                            <div class="form-group">
                                <label for="password">Password</label>
     
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
          
                            <button class="btn btn-outline-success btn-sm" type="submit"><i class="fa fa-arrow-right"></i> Create Discusion</button>
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

