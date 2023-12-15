<?php

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;


class DestroyController extends Controller
{
    public function __invoke(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index');
    }
}
