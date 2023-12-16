<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;


class UpdateController extends Controller
{
    public function __invoke(Contact $contact)
    {
        $data=request()->validate(['hotline'=>'required|string', 'sales'=>'required|string', 'schedule'=>'required|string', 'address'=>'required|string', 'email'=>'required|string']);
        $contact->update($data);


        return redirect()->route('admin.contacts.show', $contact->id);
    }
}
