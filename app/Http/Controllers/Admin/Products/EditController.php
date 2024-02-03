<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;



class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        $products=Product::all();
        $categories=Category::all();

        return view('admin.products.edit', compact(['products', 'product', 'categories']));
    }
}
