<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $guarded = ["detail_transaction_id"];

    public function Transactions()
    {
        return $this->belongsTo(Transaction::class, "transaction_id");
    }

    public function Products()
    {
        return $this->belongsTo(Product::class);
    }
}
