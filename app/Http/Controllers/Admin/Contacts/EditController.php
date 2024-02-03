<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;



class EditController extends Controller
{
    public function __invoke(Contact $contact)
    {;

        return view('admin.contacts.edit', compact(['contact']));
    }
}
