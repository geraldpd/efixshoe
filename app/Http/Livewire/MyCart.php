<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use Livewire\Component;

class MyCart extends Component
{
    public $open = '08:00'; // Tentative opening hour: 8am

    public $close = '18:00'; // Tentative closing hour: 6pm

    public $selectedPickupSlot = 0;

    public $selectedDeliverySlot = 0;

    public $services;

    public array $slots = [
        1 => '8am to 9am',
        2 => '9am to 10am',
        3 => '10am to 11am',
        4 => '12pm to 1pm',
        5 => '1pm to 2pm',
        6 => '2pm to 3pm',
        7 => '4pm to 5pm',
        8 => '5pm to 6pm'
    ];

    public function mount()
    {
        $this->services = Service::all();
    }

    public function render()
    {
        $cartItems = Cart::content();
        $servicesSelected = [];
        foreach($cartItems as $items){
            $servicesSelected[] = array_keys($items->options->services);
        }

        $getRecords = $this->services->whereIn('id', array_unique(Arr::flatten($servicesSelected)));

        $maxTurnaroundTime = $getRecords->max('turnaround_time');

        $pickupDate = now()->addDay()->format('d F Y');
        $deliveryDate = Carbon::parse($pickupDate)->addDays($maxTurnaroundTime)->format('d F Y');

        return view('livewire.my-cart', compact('cartItems', 'pickupDate', 'deliveryDate'));
    }

    public function removeItemInCart($rowId)
    {
        Cart::remove($rowId);

        $this->emit('cart_updated');

        session()->flash('success', 'Item successfully removed in your cart.');
    }

    public function checkout()
    {
        dd("Work in progress...");
    }
}
