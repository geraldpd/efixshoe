<?php

namespace App\Http\Controllers\Customer;

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
        $validatedData = $request->validate([
            'pairs_of_shoes' => ['required', 'integer', 'min:1', 'max:10'],
            'service' => ['array', 'required'],
        ]);

        dd("Work in progress...");

//        Cart::add([
//            'id' => rand(111, 999),
//            'name' => 'Booking #' . rand(111, 999),
//            'qty' => $request->pairs_of_shoes,
//            'price' => 999,
//            'weight' => 0,
//            'options' => $request->service
//        ]);

        return redirect()->back();
    }
}
