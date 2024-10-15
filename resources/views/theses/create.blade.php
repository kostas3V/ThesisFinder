@extends('layouts.app')

@section('title', '| Create Thesis')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 style="font-family: 'Raleway', sans-serif;">Create New Thesis</h3>
                            </div>
                            <div>
                                <a class="btn btn-outline-primary btn-sm" href="{{route('theses.index')}}"><i class="fa fa-arrow-left"></i> Back</a> 
                            </div>
                        </div>
                       
                    </div>
                    <div class="card-body">
                        <form action="{{route('theses.store')}}" method="POST">

                            @csrf 
        
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
        
                            <div class="form-group">
                                <label for="content">Contnet</label>
                                <input id="content" type="hidden" name="content">
                                <trix-editor input="content"></trix-editor>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>  
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="description">Description</label>
                                <select name="description" id="description" class="form-control">
                                    <option value="lock">Lock</option>
                                    <option value="unlock">Unlock</option> 
                                </select>
                            </div>

          
                            <button class="btn btn-outline-success btn-sm" type="submit"><i class="fa fa-arrow-right"></i> Create Thesis</button>
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

