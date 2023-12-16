<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Manager;



class ContactController extends Controller
{
    public function index()
    {
        $contacts=Contact::all();
        $managers=Manager::all();
        return view('main.contacts', compact('contacts', 'managers'));
    }
}
