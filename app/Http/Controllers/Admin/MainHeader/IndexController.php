<?php

namespace App\Http\Controllers\Admin\MainHeader;

use App\Http\Controllers\Controller;
use http\Header;
use Illuminate\Http\Request;

use App\Models\MainHeader;


class IndexController extends Controller
{
    public function __invoke()
    {

        $headers=MainHeader::all();


        return view('admin.main_header.index', compact(['headers']));
    }
}
