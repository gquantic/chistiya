<?php

namespace App\Http\Controllers\Admin\Banners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;


class CreateController extends Controller
{
    public function __invoke()
    {
        $reviews=Banner::all();
        return view('admin.banners.create', compact(['reviews']));
    }
}
