<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class MyCart extends Component
{
    public function render()
    {
        $cartItems = Cart::content();

        return view('livewire.my-cart', compact('cartItems'));
    }

    public function removeItemInCart($rowId)
    {
        Cart::remove($rowId);

        $this->emit('cart_updated');

        session()->flash('success', 'Item successfully removed in your cart.');
    }
}
