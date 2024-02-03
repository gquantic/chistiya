<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Manager;
use App\Models\Product;


class StoreController extends Controller
{
    public function __invoke()
    {
        if (request()->hasFile('image'))
        {
            $sql_data=
                [
                    'slug'=>request()->slug,
                    'category_id'=>request()->category_id,
                    'image'=>request()->file('image')->getClientOriginalName(),
                    'title'=>request()->title,
                    'price_1'=>request()->price_1,
                    'price_2'=>request()->price_2,
                    'price_3'=>request()->price_3,
                    'price_4'=>request()->price_4,
                    'buy_price'=>request()->buy_price,
                    'description'=>request()->description,
                    'long_description'=>request()->long_description,
                    'remains'=>request()->remains,
                    'volume'=>request()->volume,
                    'volume_text'=>request()->volume_text,
                ];
            $file = request()->file('image');
            $file->move(public_path() . '/img/product/',request()->file('image')->getClientOriginalName());
        }
        else
        {
            $sql_data=
                [
                    'slug'=>request()->slug,
                    'category_id'=>request()->category_id,
                    'title'=>request()->title,
                    'price_1'=>request()->price_1,
                    'price_2'=>request()->price_2,
                    'price_3'=>request()->price_3,
                    'price_4'=>request()->price_4,
                    'buy_price'=>request()->buy_price,
                    'description'=>request()->description,
                    'long_description'=>request()->long_description,
                    'remains'=>request()->remains,
                    'volume'=>request()->volume,
                    'volume_text'=>request()->volume_text,
                ];
        }

        Product::create($sql_data);

        return redirect()->route('admin.products.index');
    }
}
