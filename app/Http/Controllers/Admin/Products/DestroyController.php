<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Manager;
use App\Models\Product;


class DestroyController extends Controller
{
    public function __invoke(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
