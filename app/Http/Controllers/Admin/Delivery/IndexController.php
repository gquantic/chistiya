<?php

namespace App\Http\Controllers\Admin\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Delivery;


class IndexController extends Controller
{
    public function __invoke()
    {
        $delivery_s=Delivery::all();

        return view('admin.delivery.index', compact(['delivery_s']));
    }
}
