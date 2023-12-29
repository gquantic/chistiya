<?php

namespace App\Models\Catalogue;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use function PHPUnit\Framework\fileExists;

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
        if ($this->image == '' or $this->image == null)
            return asset('/thumb/2/5j3-0qrgrLOpaedx70-u9g/1900r1900/d/tb_1.png');
            //return '/thumb/2/5j3-0qrgrLOpaedx70-u9g/1900r1900/d/tb_1.png';
        if (file_exists("/storage/{$this->image}"))
        {
            return  asset("/storage/{$this->image}");
        } else {
            return asset('/img/product/' . $this->image);
        }
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
