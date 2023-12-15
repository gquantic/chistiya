<?php

namespace App\Http\Controllers\Admin\IP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\IP;


class IndexController extends Controller
{
    public function __invoke()
    {

        $ips=IP::all();


        return view('admin.ip.index', compact(['ips']));
    }
}
