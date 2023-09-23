<?php

namespace App\Models\Catalogue;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getSlug()
    {
        return Str::slug("{$this->title} {$this->volume} {$this->volume_text}");
    }

    public function getKeyName(): string
    {
        return 'slug';
    }
}
