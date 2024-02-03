<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Manager;
use App\Models\Delivery;



class DeliveryController extends Controller
{
    public function index()
    {
        $contacts=Contact::all();
        $managers=Manager::all();
        $delivery_s=Delivery::all();
        return view('main.delivery', compact('contacts', 'managers', 'delivery_s'));
    }
}
