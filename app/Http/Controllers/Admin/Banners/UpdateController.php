<?php

namespace App\Http\Controllers\Admin\Banners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;


class UpdateController extends Controller
{
    public function __invoke(Banner $banner)
    {
        $data=request()->validate(['title'=>'required|string', 'subtitle'=>'string', 'icon'=>'required']);

        if(request()->hasFile('icon'))
        {
            $file = request()->file('icon');
            $file->move(public_path() . '/img/banners/',request()->file('icon')->getClientOriginalName());
            $sql_data=['title'=>request()->title, 'subtitle'=>request()->subtitle, 'icon'=>request()->file('icon')->getClientOriginalName()];
        }
        else
            $sql_data=['title'=>request()->title, 'subtitle'=>request()->subtitle];

        $banner->update($sql_data);

        return redirect()->route('admin.banners.show', $banner->id);
    }
}
