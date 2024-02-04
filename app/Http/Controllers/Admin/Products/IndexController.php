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
        $products = Product::query();
        $categories = Category::all();

        $products = $this->applyParams($products, request()->all())->get();

        return view('admin.products.index', compact(['products', 'categories']));
    }

    protected function applyParams($query, $data)
    {
        if (isset($data['category']) && $data['category'] > 0 && $data['category'] != '') {
            $query->where('category_id', $data['category']);
        }

        if (isset($data['no_image']) && $data['no_image'] != '') {
            $query->whereNull('image');
        }

        return $query;
    }
}
