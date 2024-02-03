<?php

namespace App\Http\Controllers\Admin\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Manager;



class EditController extends Controller
{
    public function __invoke(Manager $manager)
    {
        $managers=Manager::all();

        return view('admin.managers.edit', compact(['managers', 'manager']));
    }
}
