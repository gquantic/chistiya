<?php

namespace App\Http\Controllers\Admin\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Delivery;


class DestroyController extends Controller
{
    public function __invoke(Delivery $delivery)
    {
        $delivery->delete();
        return redirect()->route('admin.delivery.index');
    }
}
