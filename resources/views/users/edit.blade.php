@extends('layouts.app')

@section('title', '| Edit Users')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 style="font-family: 'Raleway', sans-serif;">Edit Profile</h3>
                            </div>
                            <div>
                                <a class="btn btn-outline-primary btn-sm" href="{{route('users.show', $user->id)}}"><i class="fa fa-arrow-left"></i> Back</a> 
                            </div>
                        </div>  
                    </div>
                    <div class="card-body">
                        <form action="{{route('users.update', $user->id)}}" method="POST">

                            @csrf
                            @method('PUT') 
        
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{isset($user) ? $user->name : ''}}">
                            </div>
        
                            <div class="form-group">
                                <label for="info">Info</label>
                                <input id="info" type="hidden" name="info" value="{{isset($user) ? $user->info : ''}}">
                                <trix-editor input="info"></trix-editor>
                            </div>
                                    
                            <button class="btn btn-outline-success btn-sm" type="submit"><i class="fa fa-arrow-down"></i> Save Changes</button>
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

