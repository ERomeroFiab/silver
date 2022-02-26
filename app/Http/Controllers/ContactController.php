<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function show($id_contact)
    {
        $relations = [
            //
        ];
        $contact = Contact::where('ID_CONTACT', $id_contact)->with( $relations )->first();

        return view('models.contact.show', ['contact' => $contact]);
    }
}
