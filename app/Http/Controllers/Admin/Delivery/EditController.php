<?php

namespace App\Http\Controllers\Admin\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Delivery;



class EditController extends Controller
{
    public function __invoke(Delivery $delivery)
    {
        $delivery_s=Delivery::all();

        return view('admin.delivery.edit', compact(['delivery_s', 'delivery']));
    }
}
