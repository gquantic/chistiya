<?php

namespace App\Http\Controllers\Admin\MainHeader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MainHeader;



class EditController extends Controller
{
    public function __invoke(MainHeader $header)
    {;

        return view('admin.main_header.edit', compact(['header']));
    }
}
