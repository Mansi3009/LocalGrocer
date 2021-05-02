<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart');
    }

    public function addToCart(Request $request)
    {
        $cartObject = new Cart;
        $success = 0;
        $cartData = [
            'product_id' => $request->input('product_id'),
            'price' => $request->input('product_price'),
            'discount' => $request->input('product_discount'),
            'quantity' => $request->input('product_qty'),
            'user_id' => Auth::user()->id
        ];
        
        $cart = $cartObject->where(
            [
                'product_id' => $cartData['product_id'],
                'user_id' => $cartData['user_id']
            ]
        )->first();

        if (!$cart) {
            $success = $cartObject->create($cartData);    
        } else {
            $cartData['quantity'] = $cart->quantity + 1;
            $success = $cart->update($cartData);
        }
        if ($success) {
            return ['message' => 'Added to cart'];
        }
        return ['message' => 'Failed to  add cart'];
        
        //Old code
        ////$product = ProductModel::find($id);
        // $cart = ProductModel::select('product_id', 'user_id')
        //                         ->where('id',$id)->get();

        // if(isset($cart->id)) {
        //     $cart[$product->id]['quantity']++;
        // } else {
        //     $cart[$product->product_id] = [
        //         'product_id' => $cart->product_id,
        //         'user_id' => $cart->user_id,
        //         'quantity' => 1,
        //         'product_price' => $cart->price,
        //         'product_discount' => $cart->discount,
        //     ];
        // }
    }
        
}