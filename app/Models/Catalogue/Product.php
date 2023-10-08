<?php

namespace App\Models\Catalogue;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getSlug()
    {
        return Str::slug("{$this->title} {$this->volume} {$this->volume_text}");
    }

    public function getImage()
    {
        return $this->image == '' ? '/thumb/2/5j3-0qrgrLOpaedx70-u9g/1900r1900/d/tb_1.png' :
                "/storage/{$this->image}";
    }

    public function slug(): Attribute
    {
        return Attribute::make(
            fn ($value) => $value
        );
    }

    public function getKeyName(): string
    {
        return 'slug';
    }
}
