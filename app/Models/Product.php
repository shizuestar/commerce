<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ["PicProduct"];

    public function Details()
    {
        return $this->hasMany(DetailTransaction::class, "product_id");
    }

    public function PicProduct()
    {
        return $this->hasMany(PicProduct::class, "product_id");
    }
}
