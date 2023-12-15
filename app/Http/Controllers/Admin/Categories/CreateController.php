<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;



class CreateController extends Controller
{
    public function __invoke()
    {
        $categories=Category::all();
        return view('admin.categories.create', compact(['categories']));
    }
}
