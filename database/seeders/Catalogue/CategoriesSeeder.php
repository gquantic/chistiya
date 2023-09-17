<?php

namespace Database\Seeders\Catalogue;

use App\Models\Catalogue\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->insert([
            [
                'title' => 'Жидкое мыло и бытовая химия',
                'slug' => Str::slug('Жидкое мыло и бытовая химия'),
            ],
            [
                'title' => 'Средства для стирки',
                'slug' => Str::slug('Средства для стирки'),
            ],
            [
                'title' => 'Автохимия',
                'slug' => Str::slug('Автохимия'),
            ],
        ]);
    }
}
