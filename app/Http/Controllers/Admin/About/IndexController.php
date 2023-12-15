<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use http\Header;
use Illuminate\Http\Request;

use App\Models\About;


class IndexController extends Controller
{
    public function __invoke()
    {

        $abouts=About::all();


        return view('admin.about.index', compact(['abouts']));
    }
}
