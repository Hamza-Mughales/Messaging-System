<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\DB;

class Messages extends Model
{
    //
    public function get_messages()
    {
        $contatc_id = session('contact_id');

        $messages = DB::table('messages')
            ->where('contact_id', $contatc_id)
            ->get();
        return $messages;
    }

    //
    public function  get_the_message($message_id)
    {
        $contatc_id = session_id('contact_id');

        $message = DB::table('messages')->where('id', $message_id)->get();
        return $message[0];
    }
}
