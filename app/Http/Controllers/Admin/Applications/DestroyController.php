<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Application;


class DestroyController extends Controller
{
    public function __invoke(Application $application)
    {
        $application->delete();
        return redirect()->route('admin.applications.index');
    }
}
