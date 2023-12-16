<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\About;


class UpdateController extends Controller
{
    public function __invoke(About $about)
    {
        $data=request()->validate(['description'=>'required|string', 'long_description'=>'required|string']);
        $about->update($data);


        return redirect()->route('admin.about.show', $about->id);
    }
}
