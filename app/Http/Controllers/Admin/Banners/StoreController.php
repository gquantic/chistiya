<?php

namespace App\Http\Controllers\Admin\Banners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;


class StoreController extends Controller
{
    public function __invoke()
    {
        $data=request()->validate(['title'=>'required|string', 'subtitle'=>'string', 'icon'=>'required']);
        $sql_data=['title'=>request()->title, 'subtitle'=>request()->subtitle, 'icon'=>request()->file('icon')->getClientOriginalName()];

        $file = request()->file('icon');
        $file->move(public_path() . '/img/banners/',request()->file('icon')->getClientOriginalName());

        Review::create($sql_data);

        return redirect()->route('admin.banners.index');
    }
}
