<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages as Message;
use App\Contacts as Contact;
use Illuminate\Support\Facades\Redirect;

class messageController extends Controller
{
    // __construct
    public function __construct(Message $message, Contact $contact)
    {
        $this->message = $message;
        $this->contact = $contact;
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

        // dd($contacts);

        if ($request->isMethod('post'))
        {

            $contact_id = session('contact_id');
            $contact_info = $this->contact->get_contact($contact_id);
            // dd($contact_info[0]->email);
            $data = [];
            $data['send_from'] = $contact_info[0]->email;
            $data['send_to'] = $request->input('send_to');
            $data['title'] = $request->input('subject');
            $data['content'] = $request->input('message');
            $data['contact_id'] = session('contact_id');
            $this->validate(
                $request,
                [
                    'send_to' => 'required',
                    'subject' => 'required',
                    'message' => 'required'
                    ]
            );

            $message->insert($data);

            return Redirect('messages');
        }

            $all_contacts = Contact::all();
            $data['all_contacts'] = $all_contacts;
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
