<?php

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;


class ShowController extends Controller
{
    public function __invoke(Review $review)
    {
        $reviews=Review::all();

        return view('admin.reviews.show', compact(['reviews' , 'review']));
    }
}
