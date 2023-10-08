<?php

namespace App\Models\Catalogue;

use App\Orchid\Presenters\CategoryPresenter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function slug(): Attribute
    {
        return Attribute::make(
            fn ($value) => $value
        );
    }

//    public function image(): Attribute
//    {
//        return Attribute::make(
//            fn ($value) => $value == '' ? '/thumb/2/5j3-0qrgrLOpaedx70-u9g/1900r1900/d/tb_1.png' :
//                "/storage/$value",
//        );
//    }

    public function getImage()
    {
        return $this->image == '' ? '/thumb/2/5j3-0qrgrLOpaedx70-u9g/1900r1900/d/tb_1.png' :
                "/storage/{$this->image}";
    }

    public function getKeyName()
    {
        return 'slug';
    }

    public function presenter(): CategoryPresenter
    {
        return new CategoryPresenter($this);
    }
}
