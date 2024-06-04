<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PicProduct extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function ProductImage()
    {
        return $this->belongsTo(Product::class, "id");
    }
}
