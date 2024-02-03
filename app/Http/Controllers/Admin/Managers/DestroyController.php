<?php

namespace App\Http\Controllers\Admin\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Manager;


class DestroyController extends Controller
{
    public function __invoke(Manager $manager)
    {
        $manager->delete();
        return redirect()->route('admin.managers.index');
    }
}
