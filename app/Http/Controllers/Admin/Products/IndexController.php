<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;


class IndexController extends Controller
{
    public function __invoke()
    {
        $products=Product::all();
        $categories=Category::all();

        return view('admin.products.index', compact(['products', 'categories']));
    }
}
