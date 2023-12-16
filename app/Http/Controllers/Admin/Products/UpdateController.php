<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Manager;
use App\Models\Product;


class UpdateController extends Controller
{
    public function __invoke(Product $product, Request $request)
    {
        if ($request->hasFile('photo')) {
            $sql_data = [
                'slug'=>request()->slug,
                'category_id'=>request()->category_id,
                'image'=>request()->file('photo')->getClientOriginalName(),
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

            $file = request()->file('photo');
            $file->move(public_path() . '/img/product/',request()->file('photo')->getClientOriginalName());
        } else {
            $sql_data = [
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

        $product->update($sql_data);

        return redirect()->route('admin.products.show', $product->id);
    }
}
