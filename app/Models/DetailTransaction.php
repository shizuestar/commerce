<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class DetailTransaction extends Model
{
    use HasFactory;

    protected $guarded = ["detail_transaction_id"];

    public function getItemsCartUser($status, User $user)
    {
        dd($status);
        $data = DB::table('detail_transactions')
        ->join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.transaction_id')
        ->join('products', 'detail_transactions.product_id', '=', 'products.id')
        ->where('transactions.user_id', $user->id)
        ->where('transactions.status', $status)
        ->select('detail_transactions.*', 'products.name as product_name', 'products.price as product_price')
        ->get();

        return $data;
    }

    public function Transactions()
    {
        return $this->belongsTo(Transaction::class, "transaction_id");
    }

    public function Products()
    {
        return $this->belongsTo(Product::class);
    }
}
