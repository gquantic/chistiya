<?php

namespace App\Http\Controllers\Admin\Banners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;


class ShowController extends Controller
{
    public function __invoke(Banner $banner)
    {
        $banners=Banner::all();

        return view('admin.banners.show', compact(['banners' , 'banner']));
    }
}
