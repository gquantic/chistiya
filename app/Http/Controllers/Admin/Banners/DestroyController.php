<?php

namespace App\Http\Controllers\Admin\Banners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;


class DestroyController extends Controller
{
    public function __invoke(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banners.index');
    }
}
