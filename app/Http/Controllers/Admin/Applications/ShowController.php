<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Application;


class ShowController extends Controller
{
    public function __invoke(Application $application)
    {
        $applications=Application::all();

        return view('admin.applications.show', compact(['applications' , 'application']));
    }
}
