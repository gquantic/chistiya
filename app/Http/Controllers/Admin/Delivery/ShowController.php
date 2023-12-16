<?php

namespace App\Http\Controllers\Admin\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Delivery;


class ShowController extends Controller
{
    public function __invoke(Delivery $delivery)
    {
        $delivery_s=Delivery::all();

        return view('admin.delivery.show', compact(['delivery_s' , 'delivery']));
    }
}
