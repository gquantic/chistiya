<?php

namespace App\Http\Controllers\Admin\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Manager;


class UpdateController extends Controller
{
    public function __invoke(Manager $manager)
    {
        $data=request()->validate(['name'=>'required|string', 'phone'=>'required|string', 'photo']);

        if(request()->hasFile('photo'))
        {
            $file = request()->file('photo');
            $file->move(public_path() . '/img/managers/',request()->title.'-image.img');
            $sql_data=['name'=>request()->name, 'phone'=>request()->phone, 'photo'=>(request()->name).'-image.img'];
        }
        else
            $sql_data=['name'=>request()->name, 'phone'=>request()->phone];

        $manager->update($sql_data);

        return redirect()->route('admin.managers.show', $manager->id);
    }
}
