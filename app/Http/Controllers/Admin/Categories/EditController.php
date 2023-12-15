<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;



class EditController extends Controller
{
    public function __invoke(Category $category)
    {
        $categories=Category::all();

        return view('admin.categories.edit', compact(['categories', 'category']));
    }
}
