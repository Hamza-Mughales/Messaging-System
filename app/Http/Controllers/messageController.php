<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages as Message;
use Illuminate\Support\Facades\Redirect;

class messageController extends Controller
{
    // __construct
    public function __construct(Message $message)
    {
        $this->message = $message;
    }


    /****************************************** */
    // messages index
    /****************************************** */

    public function index() {
        $data = [];
        $data['messages'] = $this->message->get_messages();

        return view('messages/index', $data);
    }


    /****************************************** */
    // create new message view
    /****************************************** */

    public function new_message(Request $request, Message $message) {
        $data = [];
        $data['send_to'] = $request->input('sendTo');
        $data['title'] = $request->input('subject');
        $data['content'] = $request->input('message');
        $data['contact_id'] = session('contact_id');

        if ($request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'sendTo' => 'required',
                    'subject' => 'required',
                    'message' => 'required'
                ]
            );

            $message->insert($data);

            return Redirect('messages');
        }

        $data['modify'] = 0;
        return view('messages/messageForm', $data);
    }



    /****************************************** */
    // Show message
    /****************************************** */

    public function show_message($message_id, Message $message) {
        $data = [];
        $data['message'] = $message->get_the_message($message_id);
        return view('messages.show', $data);
    }



    /****************************************** */
    //delete new message
    /****************************************** */

    public function delete_message($message_id) {
        $deleted_nav = $this->message->find($message_id)->delete();
        return Redirect('messages');
    }

}
