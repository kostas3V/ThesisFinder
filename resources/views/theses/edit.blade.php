@extends('layouts.app')

@section('title', '| Edit Thesis')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 style="font-family: 'Raleway', sans-serif;">Edit Thesis</h3>
                            </div>
                            <div>
                                <a class="btn btn-outline-primary btn-sm" href="{{route('theses.index')}}"><i class="fa fa-arrow-left"></i> Back</a> 
                            </div>
                        </div>
                       
                    </div>
                    <div class="card-body">
                        <form action="{{route('theses.update', $thesis->id)}}" method="POST">

                            @csrf
                            @method('PUT') 
        
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{isset($thesis) ? $thesis->title : ''}}">
                            </div>
        
                            <div class="form-group">
                                <label for="content">Contnet</label>
                                <input id="content" type="hidden" name="content" value="{{isset($thesis) ? $thesis->content : ''}}">
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

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>

    

    <script src="{{asset('js/select2.min.js')}}"></script>


    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection


