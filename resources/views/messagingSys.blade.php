
@extends('layouts.app')

@section('content')
<div class="text-center container sysInterface">
    <h3 class="mainTitle p-5">Welcome to the Messaging system</h3>
    <div class="row">
        <div class="col-sm-6">
            <img class="w-100 p-1 m-auto" src="{{ asset('images/messageSys.jpg')}}" alt="system img">
        </div>

        <div class="col-sm-6">
            <a href="{{ route('new_contact') }} " class="btn btn-primary w-75 btn-lg d-block btn-create">Create Account </a>
            <a href="{{ route('login') }} " class="btn btn-success w-75 m-auto   btn-lg d-block">Login</a>
        </div>
    </div>
</div>

@endsection

