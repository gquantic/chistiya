<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Manager;
use App\Models\Banner;
use App\Models\MainHeader;



class WelcomeController extends Controller
{
    public function index()
    {
        $contacts=Contact::all();
        $managers=Manager::all();
        $banners=Banner::all();
        $header=MainHeader::all();

        return view('welcome', compact('contacts', 'managers', 'banners', 'header'));
    }
}
