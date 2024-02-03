<?php

namespace App\Http\Controllers\Admin\IP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\IP;



class EditController extends Controller
{
    public function __invoke(IP $ip)
    {;

        return view('admin.ip.edit', compact(['ip']));
    }
}
