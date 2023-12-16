<?php

namespace App\Http\Controllers\Admin\IP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\IP;


class UpdateController extends Controller
{
    public function __invoke(IP $ip)
    {
        $data=request()->validate(['hotline'=>'required|string', 'sales'=>'required|string', 'schedule'=>'required|string', 'address'=>'required|string', 'email'=>'required|string']);
        $ip->update($data);


        return redirect()->route('admin.ip.show', $ip->id);
    }
}
