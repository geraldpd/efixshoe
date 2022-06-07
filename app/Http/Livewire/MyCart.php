<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use App\Models\PaymentMethod;
use App\Models\Service;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyCart extends Component
{
    public $open = '08:00'; // Tentative opening hour: 8am

    public $close = '18:00'; // Tentative closing hour: 6pm

    public $pickupDate;

    public $deliveryDate;

    public $selectedPickupSlot = 0;

    public $selectedDeliverySlot = 0;

    public $selectedModeOfPayment = 0;

    public $services;

    public $paymentMethods;

    public array $slots = [
        1 => '8am to 9am',
        2 => '9am to 10am',
        3 => '10am to 11am',
        4 => '11am to 12pm',
        5 => '12pm to 1pm',
        6 => '1pm to 2pm',
        7 => '2pm to 3pm',
        8 => '3pm to 4pm',
        9 => '4pm to 5pm',
        10 => '5pm to 6pm'
    ];

    public array $times = [
        1 => '8',
        2 => '9',
        3 => '10',
        4 => '11',
        5 => '12',
        6 => '13',
        7 => '14',
        8 => '15',
        9 => '16',
        10 => '17'
    ];

    public function mount()
    {
        $this->services = Service::all();
        $this->paymentMethods = PaymentMethod::where('is_active', 1)->get();
    }

    public function render()
    {
        $cartItems = Cart::content();

        if( $cartItems->count() == 0 ){
            return view('livewire.my-cart', compact('cartItems'));
        }

        $servicesSelected = [];
        foreach($cartItems as $items){
            $servicesSelected[] = array_keys($items->options->services);
        }

        $getRecords = $this->services->whereIn('id', array_unique(Arr::flatten($servicesSelected)));

        $maxTurnaroundTime = $getRecords->max('turnaround_time');

        $this->pickupDate = now()->addDay();
        $this->deliveryDate = Carbon::parse($this->pickupDate)->addDays($maxTurnaroundTime);

        return view('livewire.my-cart', compact('cartItems'));
    }

    public function removeItemInCart($rowId)
    {
        Cart::remove($rowId);

        $this->emit('cart_updated');

        session()->flash('success', 'Item successfully removed in your cart.');
    }

    public function checkout()
    {
        $cartItems = Cart::content();
        $cartPriceTotal = Cart::priceTotal(2, ".", "");

        if( $cartItems->count() == 0 || !array_key_exists($this->selectedPickupSlot, $this->times) || !array_key_exists($this->selectedDeliverySlot, $this->times) ){
            session()->flash('error', 'An error occurred while processing your request.');
            $this->emit('cart_updated');
        }

        $this->pickupDate->setTime($this->times[$this->selectedPickupSlot], 0, 0);
        $this->deliveryDate->setTime($this->times[$this->selectedDeliverySlot], 0, 0);

        $booking = Booking::create([
            'user_id' => Auth::user()->id,
            'status' => Booking::PENDING,
            'pickup_date' => $this->pickupDate,
            'delivery_date' => $this->deliveryDate
        ]);

        $services = [];
        foreach($cartItems as $items){
            $services[] = array_keys($items->options->services);

            $bookingItem = $booking->bookingItems()->create([
                'pairs_of_shoes' => $items->qty
            ]);

            $bookingItem->services()->attach(array_keys($items->options->services));
        }

        // foreach(array_unique(Arr::flatten($services)) as $service){
        //     $booking->bookingServices()->create([
        //         'service_id' => $service
        //     ]);
        // }

        // $booking->services()->attach(array_unique(Arr::flatten($services)));

        $booking->paymentDetail()->create([
            'payment_method_id' => $this->selectedModeOfPayment,
            'total_cost' => (float) $cartPriceTotal * 100
        ]);

        Cart::destroy();

        $this->reset();

        session()->flash('success', 'Thank you for your booking with us. You can view the details on your Account page.');

        $this->emit('cart_updated');
    }
}
