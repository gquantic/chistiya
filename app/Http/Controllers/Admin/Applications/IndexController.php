<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Application;


class IndexController extends Controller
{
    public function __invoke()
    {
        $applications=Application::all();

        return view('admin.applications.index', compact(['applications']));
    }
}
