<?php

namespace App\Http\Controllers\Customer;

use App\Models\Service;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('customer.booking');
    }

    public function addToCart(Request $request)
    {
//        $request->validate([
//            'pairs_of_shoes' => ['required', 'integer', 'min:1', 'max:10'],
//            'service' => ['array', 'required', 'exists:App\Models\Service,id'],
//        ]);
//
//        $services = Service::whereIn('id', $request->service)->get();
//
//        $totalPrice = (int) $request->pairs_of_shoes * $services->sum('cost');
//
//        $hash = md5(rand(1, 999999));
//
//        Cart::add([
//            'id' => $hash,
//            'name' => 'Booking #' . $hash,
//            'qty' => $request->pairs_of_shoes,
//            'price' => $totalPrice,
//            'weight' => 0,
//            'options' => [
//                'services' => $services->pluck('name', 'id')->toArray()
//            ]
//        ]);
//
//        return redirect()->route('customer.booking')->with('success', 'Successfully added to cart.');
    }

    public function myCart()
    {
        $cartItems = Cart::content();

        return view('customer.cart', compact('cartItems'));
    }
}
