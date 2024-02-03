<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;


class UpdateController extends Controller
{
    public function __invoke(Category $category)
    {
        if (request()->hasFile('image'))
        {
            $sql_data=
                [
                    'slug'=>request()->slug,
                    'image'=>request()->file('image')->getClientOriginalName(),
                    'title'=>request()->title,
                    'description'=>request()->description,
                ];
            $file = request()->file('image');
            $file->move(public_path() . '/img/product/',request()->file('image')->getClientOriginalName());
        }
        else
        {
            $sql_data=
                [
                    'slug'=>request()->slug,
                    'title'=>request()->title,
                    'description'=>request()->description,
                ];
        }

        $category->update($sql_data);

        return redirect()->route('admin.categories.show', $category->id);
    }
}
