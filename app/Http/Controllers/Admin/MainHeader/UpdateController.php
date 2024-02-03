<?php

namespace App\Http\Controllers\Admin\MainHeader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MainHeader;


class UpdateController extends Controller
{
    public function __invoke(MainHeader $header)
    {
        $data=request()->validate(['title'=>'required|string', 'subtitle'=>'required|string']);
        $header->update($data);


        return redirect()->route('admin.main_header.show', $header->id);
    }
}
