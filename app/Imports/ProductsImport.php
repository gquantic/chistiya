<?php

namespace App\Imports;

use App\Models\Catalogue\Product;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'slug' => Str::slug($row[0]),
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
    }
}
