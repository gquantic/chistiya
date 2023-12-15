<?php

namespace App\Http\Controllers\Admin\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Manager;


class CreateController extends Controller
{
    public function __invoke()
    {
        $managers=Manager::all();
        return view('admin.managers.create', compact(['managers']));
    }
}
