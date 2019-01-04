@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-not-found shadow-sm p-5 my-auto">
                    <h2 class="display-4 text-center h1">Page Not Found </h2>
                    <p class="text-center h4">Sorry, the page you are looking for could not be found 
                        <span class="text-muted">
                            <a href="{{ url('/') }}">Go Back To Home</a>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection