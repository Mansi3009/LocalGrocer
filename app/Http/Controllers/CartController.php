<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\Cart;


class CartController extends Controller
{
    public function cart()
    {
        return view('cart');
    }

    public function addToCart(Request $request)
    {
        //dd($request->all());
        $product = ProductModel::find($id);
        dd($product);

        $product_id = $request->input('product_id');
        $product_price = $request->input('product_price');
        $product_discount = $request->input('product_discount');

        $cart = ProductModel::select('product_id', 'user_id')
                                ->where('id',$id)->get();

        @if(isset($cart->id))
            $cart[$product->id]['quantity']++;
            
        @else
        $cart[$product->product_id] = [
            'product_id' => $cart->product_id,
            'user_id' => $cart->user_id,
            'quantity' => 1,
            'product_price' => $cart->price,
            'product_discount' => $cart->discount,
        ];
        @endif
    }
        
}