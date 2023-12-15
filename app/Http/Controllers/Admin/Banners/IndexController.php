<?php

namespace App\Http\Controllers\Admin\Banners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;


class IndexController extends Controller
{
    public function __invoke()
    {
        $banners=Banner::all();

        return view('admin.banners.index', compact(['banners']));
    }
}
