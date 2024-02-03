<?php

namespace App\Http\Controllers\Admin\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Delivery;


class UpdateController extends Controller
{
    public function __invoke(Delivery $delivery)
    {
        $data=request()->validate(['title'=>'required|string', 'subtitle'=>'required']);
        $delivery->update($data);
        return redirect()->route('admin.delivery.show', $delivery->id);
    }
}
