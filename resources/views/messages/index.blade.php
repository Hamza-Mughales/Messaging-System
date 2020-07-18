@extends('layouts/layout')

@section('content')

<h1 class="text-center m-3">Messages</h1>

<a href="{{ route('new_message') }} " class="btn btn-primary mb-1">Send Message </a>


<table class="table table-striped table-hover tbl_massages">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Send To</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach( $messages as $msg )
        <tr data-toggle="tooltip" data-placement="top"  title="Click To Show The Message" class='clickable-row' data-href="{{route('show_message',['message_id' => $msg->id ]) }}">
            <td> {{$msg->id}}</td>
            <td> {{$msg->title}}</td>
            <td class=" w-50"> {{$msg->content}}</td>
            <td> {{$msg->send_to}}</td>
            <td>
                <a href="{{ route('delete_message',['msg_id' => $msg->id ]) }}" class="btn btn-danger btn-sm">
                    <i class="fa fa-times"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>


@endsection

