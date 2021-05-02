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
            $success = $cartData->create($cartData);    
        } else {
            $cartData['quantity'] = $cart->quantity + 1;
            $success = $cart->update($cartData);
        }
        if ($success) {
            return ['message' => 'Added to cart'];
        }
        return ['message' => 'Failed to  add cart']; 
    }
}