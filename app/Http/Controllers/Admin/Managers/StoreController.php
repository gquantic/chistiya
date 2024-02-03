<?php

namespace App\Http\Controllers\Admin\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Manager;


class StoreController extends Controller
{
    public function __invoke()
    {
        $data=request()->validate(['name'=>'required|string', 'phone'=>'required|string', 'photo'=>'required']);
        $sql_data=['name'=>request()->name, 'phone'=>request()->phone, 'photo'=>(request()->name).'-image.img'];

        $file = request()->file('photo');
        $file->move(public_path() . '/img/managers/',request()->title.'-image.img');

        Manager::create($sql_data);
        //$categories=Category::all();

        return redirect()->route('admin.managers.index');
    }
}
