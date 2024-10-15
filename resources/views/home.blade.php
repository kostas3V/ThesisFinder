@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 style="font-family: 'Raleway', sans-serif;">Dashboard<h3>
                        </div>
                        <div>
                        
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="jumbotron">
                        <h3 class="display-6 text-center" style="font-family: 'Raleway', sans-serif;">Hello {{auth()->user()->name}} !!!</h3>
                        <p class="text-center" style="font-family: 'Raleway', sans-serif;">Wellcome to ThesisFinder !</p>
                        <hr>
                        <p class="text-center">An application to help you find your Thesis.</p>
                        <div class="text-center">
                            <p>
                                <a class="btn btn-outline-primary btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-info-circle"></i> Learn More</a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body"> 
                                  <small>Πτυχιακή Εργασία.</small> 
                                </div>
                            </div> 
                        </div>
                    </div> 
                </div>                         
            </div>
        </div>
    </div>
</div>
@endsection
