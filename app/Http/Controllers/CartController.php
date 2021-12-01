<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function Show()
    {
        
        $cart = session()->get('cart');
        if (!$cart || count($cart) == 0) 
        {
            return redirect()->route('home')->with('danger', __('There isn\'t any item in the cart'));
        }

        $sum = 0;
        foreach ($cart as $item)
        {
            $sum += $item['quantity'] * $item['food']->price;
        }
        
        return view('cart')->with(compact('cart', 'sum'));
    }

    public function Add(Food $food)
    {
        if (!$food) abort(404);

        $cart = session()->get('cart');

        if (!$cart) 
        {
            $cart = [ $food->id => [ 'food' => $food, 'quantity' => 1] ];  
        }
        else if (isset($cart[$food->id])) 
        {
            $cart[$food->id]['quantity']++;
        }
        else 
        {
            $cart[$food->id] =  [ 'food' => $food, 'quantity' => 1] ;  
        }

        session()->put('cart', $cart);
        return back()->with('success', __($food->name.' added successfully'));
    }

    public function Order()
    {
        session()->forget('cart');

        return redirect()->route('home')->with('success', __('Order submitted successfully'));
    }

    public function Delete(Food $food)
    {
        $cart = session()->get('cart');
        unset($cart[$food->id]);
        session()->put('cart', $cart);
        return redirect()->route('cart');
    }
}
