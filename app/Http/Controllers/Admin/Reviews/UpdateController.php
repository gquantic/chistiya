<?php

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Manager;


class UpdateController extends Controller
{
    public function __invoke(Review $review)
    {
        $data=request()->validate(['name'=>'required|string', 'text'=>'required', 'photo'=>'required']);

        if(request()->hasFile('photo'))
        {
            $file = request()->file('photo');
            $file->move(public_path() . '/img/managers/',request()->file('photo')->getClientOriginalName());
            $sql_data=['name'=>request()->name, 'text'=>request()->text, 'photo'=>request()->file('photo')->getClientOriginalName()];
        }
        else
            $sql_data=['name'=>request()->name, 'text'=>request()->text];

        $review->update($sql_data);

        return redirect()->route('admin.reviews.show', $review->id);
    }
}
