<?php

namespace App\Models;

use Clockwork\Request\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['transaction_id'];

    public function TransactionsT()
    {
        return $this->belongsTo(User::class);
    }
    public function DetailTransactions()
    {
        return $this->hasMany(DetailTransaction::class, "transaction_id");
    }
    public static function addToCart(User $user, Product $product, $request)
    {
        $total = $request * $product->price;
        
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'total' => $total,
            "date" =>now(),
            "status" => null
        ]);

        $detailTransaction = DetailTransaction::create([
            'transaction_id' => $transaction->id,
            'product_id' => $product->id,
            'quantity' => $request,
            'price' => $product->price,
            'subtotal' => $total
        ]);

        $stock = ($product->stock) - $request;
        $stock = [
            "stock" => $stock
        ];
        Product::where("id", $product->id)->update($stock);


        return $transaction;
    }

}
