<?php

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;


class StoreController extends Controller
{
    public function __invoke()
    {
        $data=request()->validate(['name'=>'required|string', 'text'=>'required', 'photo'=>'required']);
        $sql_data=['name'=>request()->name, 'text'=>request()->text, 'photo'=>request()->file('photo')->getClientOriginalName()];

        $file = request()->file('photo');
        $file->move(public_path() . '/img/reviews/',request()->file('photo')->getClientOriginalName());

        Review::create($sql_data);

        return redirect()->route('admin.reviews.index');
    }
}
