<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts as Contact;
use Illuminate\Support\Facades\Redirect;

class contactController extends Controller
{
    // __construct
    public function __construct(Contact $contact, Request $request)
    {
        $this->contact = $contact;
        $this->request = $request;
    }

    /****************************************** */
    // Contact Info
    /****************************************** */

        public function index() {
            $contact_id = session('contact_id');
            $contact_info = $this->contact->get_contact($contact_id);
            $data = [];
            $data['contact'] = $contact_info[0];

            return view('contacts/index', $data);
        }



    /****************************************** */
    // create new contact view
    /****************************************** */
    public function new_contact(Request $request, Contact $contact) {
        $data = [];
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['password'] = $request->input('password');
        $data['phone'] = $request->input('phone');
        $data['company'] = $request->input('company');

        if ($request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                ]
            );

            $contact->insert($data);

            return Redirect('login');
        }

        $data['modify'] = 0;
        return view('contacts/contactForm', $data);
    }




    /****************************************** */
    // Edit Contact
    /****************************************** */
    public function edit_contact(Request $request, $contact_id = 0)
    {

        if ($request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                    ]
                );

                $content_id = (int)$request->input('id');
                $new_data = $this->contact->find($content_id);
                $new_data->id = $content_id;
                $new_data->name = $request->input('name');
                $new_data->email = $request->input('email');
                $new_data->password = $request->input('password');
                $new_data->phone = $request->input('phone');
                $new_data->company = $request->input('company');

            $process = $new_data->save();

            return redirect()->route('contact_info');
        }

        $contact = $this->contact->get_contact($contact_id)[0];

        $data = [];
        $data['id'] = session('contact_id');
        $data['name'] = $contact->name;
        $data['email'] = $contact->email;
        $data['password'] = $contact->password;
        $data['phone'] = $contact->phone;
        $data['company'] = $contact->company;
        $data['modify'] = 1;
        return view('contacts/contactForm',$data);
    }

    /****************************************************************************** */

    /****************************************** */
    // Login
    /****************************************** */

    public function login(Request $request, Contact $contact) {

        if ($request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'password' => 'required',
                    ]
                );
                $data = [];
                $data['name'] = $request->input('name');
                $data['password'] = $request->input('password');

                $contact_id = $this->contact->get_contact_2($data);
                if ($contact_id != 0) {
                    //set session
                    session(['contact_id' => $contact_id]);
                    return redirect()->route('messages');
                }
                else {
                    $request->session()->flash('login_err', 'Sorry Wrong Name or Password!');
                    return redirect()->route('login');
                }
        }
        return view('login');
    }



    /****************************************** */
    // Logout
    /****************************************** */
    public function logout(Request $request) {
        $request->session()->forget('contact_id');
        return redirect('/');
    }


}
