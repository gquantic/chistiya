<?php

namespace App\Imports;

use App\Models\Catalogue\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToCollection
{
    public function collection(Collection|\Illuminate\Support\Collection $rows)
    {
        foreach ($rows as $row)
        {
            $product = Product::query()->create([
                'slug' => Str::slug("{$row[0]} {$row[5]} {$row[6]}"),
                'title' => $row[0],
                'price_1' => $row[1],
                'price_2' => $row[2],
                'price_3' => $row[3],
                'price_4' => $row[4],
                'buy_price' => $row[1],
                'remains' => 1000,
                'volume' => $row[5],
                'volume_text' => $row[6],
                'category_id' => $row[7],
            ]);

//            $categoryProduct = DB::table('category_product')->insert([
//                [
//                    'product_id' => $product->id,
//                    'category_id' => $row[7],
//                ]
//            ]);
        }
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $product = new Product([
            'slug' => Str::slug("{$row[0]} {$row[5]} {$row[6]}"),
            'title' => $row[0],
            'price_1' => $row[1],
            'price_2' => $row[2],
            'price_3' => $row[3],
            'price_4' => $row[4],
            'buy_price' => $row[1],
            'remains' => 1000,
            'volume' => $row[5],
            'volume_text' => $row[6],
        ]);

//        $categoryProduct = DB::table('category_product')->insert([
//            [
//                'product_id' => $product->id,
//                'category_id' => rand(1, 3),
//            ]
//        ]);

        return $product;
    }
}
