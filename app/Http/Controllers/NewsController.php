<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;



class NewsController extends Controller
{
    public function index()
    {
        $contacts=Contact::all();
        return view('news.index', compact('contacts'));
    }
}
