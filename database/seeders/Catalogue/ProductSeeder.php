<?php

namespace Database\Seeders\Catalogue;

use App\Models\Catalogue\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::query()->insert([
            [
                'title' => 'Крем-мыло Мёд с молоком',
                'price_1' => 105.00,
                'price_2' => 92.00,
                'price_3' => 79.00,
                'price_4' => 66.00,
                'volume' => 0.5,
                'volume_text' => 'л дозатор'
            ],
            [
                'title' => 'Крем-мыло Мёд с молоком',
                'price_1' => 135.00,
                'price_2' => 116.67,
                'price_3' => 98.33,
                'price_4' => 80.00,
                'volume' => 1,
                'volume_text' => 'л дозатор'
            ],
            [
                'title' => 'Крем-мыло Мёд с молоком',
                'price_1' => 650.00,
                'price_2' => 538.33,
                'price_3' => 426.67,
                'price_4' => 315.00,
                'volume' => 5,
                'volume_text' => 'л канистра'
            ],
            [
                'title' => 'Крем-мыло Мёд с молоком',
                'price_1' => 600.00,
                'price_2' => 477.33,
                'price_3' => 354.67,
                'price_4' => 232.00,
                'volume' => 5,
                'volume_text' => 'л ПЭТ'
            ],
            // Жидкое мыло Алоэ Вера
            [
                'title' => 'Жидкое мыло Алоэ Вера',
                'price_1' => 115.00,
                'price_2' => 100.00,
                'price_3' => 85.00,
                'price_4' => 70.00,
                'volume' => 0.5,
                'volume_text' => 'л дозатор'
            ],
            [
                'title' => 'Жидкое мыло Алоэ Вера',
                'price_1' => 145.00,
                'price_2' => 125.67,
                'price_3' => 106.33,
                'price_4' => 87.00,
                'volume' => 1,
                'volume_text' => 'л дозатор'
            ],
            [
                'title' => 'Жидкое мыло Алоэ Вера',
                'price_1' => 670.00,
                'price_2' => 563.33,
                'price_3' => 456.67,
                'price_4' => 350.00,
                'volume' => 5,
                'volume_text' => 'л канистра'
            ],
            [
                'title' => 'Жидкое мыло Алоэ Вера',
                'price_1' => 650.00,
                'price_2' => 521.67,
                'price_3' => 393.33,
                'price_4' => 265.00,
                'volume' => 5,
                'volume_text' => 'л ПЭТ'
            ],
        ]);
    }
}
