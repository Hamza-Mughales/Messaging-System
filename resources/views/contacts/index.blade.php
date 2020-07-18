@extends('layouts/layout')

@section('content')

<h1 class="text-center m-3">Contact Info</h1>
<div class="contact-info">
<table class="table text-center tbl_contactProfile">
    <tbody>
        <tr>
            <th>Contact Name</th>
            <td>{{$contact->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$contact->email}}</td>
        </tr>
        <tr>
            <th>Password</th>
            <td>{{$contact->password}}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{$contact->phone}}</td>
        </tr>
        <tr>
            <th>Company</th>
            <td>{{$contact->company}}</td>
        </tr>
    </tbody>
</table>
<div class="text-center w-full">
<a href="{{ route('edit_contact', $contact->id) }}" class="contact1-form-btn btn m-auto text-center w-25 ">
    <span>
        Edit Info
        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
    </span>
</a>

</div>
</div>


@endsection
