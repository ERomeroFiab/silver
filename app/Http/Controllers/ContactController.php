<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $contact = Contact::where('ID_CONTACT', $request->get('id_contact'))->with( $relations )->first();

        return view('models.contact.show', ['contact' => $contact]);
    }
}
