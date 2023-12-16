<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Manager;
use App\Models\Review;



class ReviewsController extends Controller
{
    public function index()
    {
        $contacts=Contact::all();
        $managers=Manager::all();
        $reviews=Review::all();
        return view('reviews.index', compact('contacts', 'managers', 'reviews'));
    }
}
