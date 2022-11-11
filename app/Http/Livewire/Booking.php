<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Livewire\Component;

class Booking extends Component
{
    public $quantity;

    public array $selectedServices = [];

    public $services;

    protected $messages = [
        'quantity.*.required' => 'Quantity is required.',
        'quantity.*.integer' => 'Quantity should be a numeric value.',
        'quantity.*.min' => 'Minimum Quantity is 1.',
        'quantity.*.max' => 'Quantity should not exceed 10.'
    ];

    public function mount()
    {
        $this->services = Service::all();

        foreach( $this->services as $service ){
            $this->quantity[$service->id] = 1;
        }
    }

    public function render()
    {
        return view('livewire.booking');
    }

    public function addToMyCart($serviceId)
    {
        $this->validate([
            'quantity.'.$serviceId => ['required', 'integer', 'min:1', 'max:10']
        ]);

        $services = Service::where('id', $serviceId)->get();

        $hash = md5(rand(1, 999999));

        Cart::add([
            'id' => $hash,
            'name' => 'Booking #' . $hash,
            'qty' => $this->quantity[$serviceId],
            'price' => $services->sum('cost'),
            'weight' => 0,
            'options' => [
                'services' => $services->pluck('name', 'id')->toArray()
            ]
        ]);

        foreach( $this->services as $service ){
            $this->quantity[$service->id] = 1;
        }

        session()->flash('success', 'Successfully added to cart.');

        $this->emit('cart_updated');
    }
}
