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
    // Users 
    public function storeCart(Request $request){
        // dd($request);
        $product_id = $request->input('id');
        $product = Product::where("id", $product_id)->first();
        $quantity=$request->input('quantity');
        $user = auth()->user();
        
        $transaction = Transaction::addToCart($user, $product, $quantity);

        return redirect("/")->with("succes", "Succesful addes to carts!");
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

        $uncheckout = DB::table('detail_transactions')
            ->join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.transaction_id')
            ->join('products', 'detail_transactions.product_id', '=', 'products.id')
            ->where('transactions.user_id', $user_id)
            ->where('transactions.status', null)
            ->select('detail_transactions.*', 'products.name as product_name', 'products.price as product_price')
            ->get();

        $unpaids = DB::table('detail_transactions')
            ->join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.transaction_id')
            ->join('products', 'detail_transactions.product_id', '=', 'products.id')
            ->where('transactions.user_id', $user_id)
            ->where('transactions.status', "unpaid")
            ->select('detail_transactions.*', 'products.name as product_name', 'products.price as product_price')
            ->get();

        $paids = DB::table('detail_transactions')
            ->join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.transaction_id')
            ->join('products', 'detail_transactions.product_id', '=', 'products.id')
            ->where('transactions.user_id', $user_id)
            ->where('transactions.status', "paid")
            ->select('detail_transactions.*', 'products.name as product_name', 'products.price as product_price')
            ->get();

        $completeds = DB::table('detail_transactions')
            ->join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.transaction_id')
            ->join('products', 'detail_transactions.product_id', '=', 'products.id')
            ->where('transactions.user_id', $user_id)
            ->where('transactions.status', "completed")
            ->select('detail_transactions.*', 'products.name as product_name', 'products.price as product_price')
            ->get();

        return view("dashboard.user.index", [
            "uncheckout" => $uncheckout,
            "unpaids" => $unpaids,
            "paids" => $paids,
            "completeds" => $completeds
        ]);
    }

    public function checkOut(Request $request)
    {
        Transaction::where("transaction_id", $request->transaction_id)->update(["status" => "unpaid", "updated_at" => now()]);
        DetailTransaction::where("transaction_id", $request->transaction_id)->update(["updated_at" => now()]);

        return redirect("/dashboard/user/carts")->with("succes", "Succesful check out!");
    }

    // show carts item where user added
    public function getCartItemsUser() 
    {
        $cartItems = DB::table('detail_transactions')
            ->join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.transaction_id')
            ->join('products', 'detail_transactions.product_id', '=', 'products.id')
            ->where('transactions.user_id', auth()->user()->id)
            ->where('transactions.status', null)
            ->select('detail_transactions.*', 'products.name as product_name', 'products.price as product_price')
            ->get();
        return $cartItems; 
    }
    

    // Admin
    public function showAllOrders()
    {
        $orders_unpaid = DB::table('detail_transactions')
            ->join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.transaction_id')
            ->join('products', 'detail_transactions.product_id', '=', 'products.id')
            ->join("users", "transactions.user_id", "=", "users.id")
            ->where('transactions.status', "unpaid")
            ->select('detail_transactions.*', "users.name as user_name", 'products.name as product_name', 'products.price as product_price')
            ->get();
        $orders_paid = DB::table('detail_transactions')
            ->join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.transaction_id')
            ->join('products', 'detail_transactions.product_id', '=', 'products.id')
            ->join("users", "transactions.user_id", "=", "users.id")
            ->where('transactions.status', "paid")
            ->select('detail_transactions.*', "users.name as user_name", 'products.name as product_name', 'products.price as product_price')
            ->get();
        $orders_completed = DB::table('detail_transactions')
            ->join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.transaction_id')
            ->join('products', 'detail_transactions.product_id', '=', 'products.id')
            ->join("users", "transactions.user_id", "=", "users.id")
            ->where('transactions.status', "completed")
            ->select('detail_transactions.*', "users.name as user_name", 'products.name as product_name', 'products.price as product_price')
            ->get();

        // return $carts;
        return view("dashboard.index", [
            "ordersUnpaid" => $orders_unpaid,
            "ordersPaid" => $orders_paid,
            "ordersCompleted" => $orders_completed
        ]);
    }
    
    public function confirmAdmin(Request $request)
    {
        Transaction::where("transaction_id", $request->transaction_id)->update(["status" => $request->status, "updated_at" => now()]);
        DetailTransaction::where("transaction_id", $request->transaction_id)->update(["updated_at" => now()]);

        return redirect("/dashboard/orders")->with("succes", "Succesful change status to " . $request->status . " !");
    }
}
