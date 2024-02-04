<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function image()
    {
        return $this->image == '' ? '/thumb/2/5j3-0qrgrLOpaedx70-u9g/1900r1900/d/tb_1.png' :
            "/img/product/{$this->image}";
    }
}
