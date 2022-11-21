<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class FrontendNav extends Component
{
    public $listeners = ['cart_updated' => 'render'];

    public function render()
    {
        $cartCount = Cart::content()->count();
        $user = request()->user();
        return view('livewire.frontend-nav', compact('cartCount', 'user'));
    }
}
