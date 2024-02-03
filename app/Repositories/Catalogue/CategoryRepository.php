<?php

namespace App\Repositories\Catalogue;

use App\Models\Catalogue\Category;

class CategoryRepository
{
    /**
     * Получим все категории с базовыми правилами.
     * Используется в быстром меню верху страницы категорий.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function all(): \Illuminate\Database\Eloquent\Builder
    {
        return Category::query()->orderByDesc('sort');
    }
}
