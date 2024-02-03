<?php

namespace App\Http\Controllers\Admin\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Delivery;


class StoreController extends Controller
{
    public function __invoke()
    {
        $data=request()->validate(['title'=>'required|string', 'subtitle'=>'required|string']);

        Delivery::create($data);

        return redirect()->route('admin.delivery.index');
    }
}
