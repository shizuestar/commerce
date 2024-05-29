<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function storeCart(Request $request){
        // dd($request);
        $product_id = $request->input('id');
        $product = Product::where("id", $product_id)->first();
        $quantity=$request->input('quantity');
        $user=auth()->user();
        $transaction = Transaction::addToCart($user, $product, $quantity);

        return redirect("/");
    }

    public function showAllCarts()
    {
        // $detailTransaction = DetailTransaction::where("transaction_id", $user_id)->get();
        // $detailTransaction = $detailTransaction->
        // return $detailTransaction;
        
        // $user = auth()->user();
        // $carts = Transaction::where('user_id', $user->id)
        //     ->where('status', null) // assuming carts are those with null status
        //     ->with('detailTransactions.product')
        //     ->get();
        
        $user_id = auth()->user()->id;

        $carts = DB::table('detail_transactions')
            ->join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.transaction_id')
            ->join('products', 'detail_transactions.product_id', '=', 'products.id')
            ->where('transactions.user_id', $user_id)
            ->select('detail_transactions.*', 'products.name as product_name', 'products.price as product_price')
            ->get();

        // return $carts;
        return view("dashboard.index", [
            "carts" => $carts
        ]);
    }
}
