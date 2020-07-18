<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contacts extends Model
{
    public $timestamps = false;
    //
    public function get_contact($id)
    {
        $contact = DB::table('contacts')
            ->where('id', $id)
            ->get();
        return $contact;
    }

    public function get_contact_2($data)
    {
        $contact = DB::table('contacts')
            ->where('name', $data['name'])
            ->orWhere('email', $data['name'])
            ->get();

        if ($contact->isEmpty()) {
            return 0;
        } else {
            if ($contact[0]->password === $data['password']) {
                return $contact[0]->id;
            } else {
                return 0;
            }
        }
    }
}
