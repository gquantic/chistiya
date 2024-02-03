<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\About;


class ShowController extends Controller
{
    public function __invoke(About $about)
    {
        return view('admin.about.show', compact(['about']));
    }
}
