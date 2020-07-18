
@extends('layouts/app')

@section('navLinks')

    <a href="{{ route('messages') }} " class="nav-item nav-link">Messages</a>
    <a href="{{ route('contact_info')}} " class="nav-item nav-link">Contact Info</a>
    <div class="navbar-nav ml-auto">
            <a href="{{ route('logout') }}" class="nav-item nav-link border-danger" style="border:1px solid">Logout</a>
        </div>
</div>

@endsection
