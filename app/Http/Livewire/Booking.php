<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Livewire\Component;

class Booking extends Component
{
    public int $quantity = 1;

    public array $selectedServices = [];

    public $services;

    protected $rules = [
        'quantity' => ['required', 'integer', 'min:1', 'max:10'],
        'selectedServices' => ['array', 'required', 'exists:App\Models\Service,id,is_active,1']
    ];

    protected $messages = [
        'selectedServices.exists' => 'Selected Service(s) are invalid.'
    ];

    public function mount()
    {
        $this->services = Service::all();
    }

    public function render()
    {
        return view('livewire.booking');
    }

    public function addToMyCart()
    {
        $this->validate();

        $services = Service::whereIn('id', $this->selectedServices)->get();

        // $totalPrice = $this->quantity * $services->sum('cost');

        $hash = md5(rand(1, 999999));

        Cart::add([
            'id' => $hash,
            'name' => 'Booking #' . $hash,
            'qty' => $this->quantity,
            'price' => $services->sum('cost'),
            'weight' => 0,
            'options' => [
                'services' => $services->pluck('name', 'id')->toArray()
            ]
        ]);

        $this->selectedServices = [];

        session()->flash('success', 'Successfully added to cart.');

        $this->emit('cart_updated');
    }
}
