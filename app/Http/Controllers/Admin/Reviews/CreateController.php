<?php

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;


class CreateController extends Controller
{
    public function __invoke()
    {
        $reviews=Review::all();
        return view('admin.reviews.create', compact(['reviews']));
    }
}
