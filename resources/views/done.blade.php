@extends('layouts.app')

@section('content')
    <div class="container main_container">
        <div class="row">
            <div class="col-md-12" style="padding-top:50px;">
                <div class="panel panel-default panel-profile m-b-md">
                    <div class="panel-body text-center">
                        <h2>Message sent</h2>
                        <h3>Get Your Link Now</h3>
                        <a id="signupp" href="{{ route('register') }}" class="btn btn-primary">Signup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
