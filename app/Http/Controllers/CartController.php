<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function tambah(Request $request, $id)
    {
        $cart = new Cart;
        $cart->product_id = $id;
        $cart->user_id = Auth::user()->id;
        $cart->qty = $request->qty;
        $cart->status_transaction = 1; //get_paid
        $cart->save();

        //update stock product
        $last_stock = Product::find($id);
        $update_produk = Product::find($id)->update([
            'qty' => $last_stock->qty - $request->qty,
        ]);

        //reward
        $reward = 0 ;
        $harga_product = Product::find($id);
        $total = $request->qty * $harga_product->price;
        if($total  <= 50000){
            $reward = 20;
        }
        else if($total > 50000){
            $reward = 40;
        }

        //update_reward
        $current_reward = User::find(Auth::user()->id);
        $update_reward = User::find( Auth::user()->id)->update([
            'reward' => $current_reward->reward + $reward
        ]);

        return back()->with("success", "Your transaction has been successfull ");


    }
}
