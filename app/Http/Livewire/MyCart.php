<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use App\Models\PaymentMethod;
use App\Models\Service;
use App\Models\Voucher;
use App\Notifications\NewBooking;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MyCart extends Component
{
    use WithFileUploads, LivewireAlert;
    
    public $open = '08:00'; // Tentative opening hour: 8am

    public $close = '18:00'; // Tentative closing hour: 6pm

    public $pickupDate;

    public $deliveryDate;

    public $selectedPickupSlot = 0;

    public $selectedDeliverySlot = 0;

    public $selectedModeOfPayment = 0;

    public $services;

    public $paymentMethods;

    public $receipt;

    public $voucher;

    public $priceTotal;

    public $subTotal;

    public $discount;

    public $isVoucherApplied = false;

    public $showReceiptDiv = false;

    public $paymentMethodDetails;

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

    public $rowCartId;

    protected $listeners = [
        'removedItemInCart'
    ];

    public function mount()
    {
        $this->services = Service::all();
        $this->paymentMethods = PaymentMethod::where('is_active', 1)->get();
        Cart::setGlobalDiscount(0);
        $this->discount = 0;
    }

    public function render()
    {
        $cartItems = Cart::content();
        $this->subTotal = Cart::priceTotal();
        $this->priceTotal = Cart::subTotal();

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

    public function change()
    {
        $this->paymentMethodDetails = $this->paymentMethods->where('id', $this->selectedModeOfPayment)->first();

        if( in_array($this->selectedModeOfPayment, $this->paymentMethods->where('name', '!=', 'Cash')->pluck('id')->toArray()) ){
            $this->showReceiptDiv = true;
        }
        else{
            $this->showReceiptDiv = false;
        }
    }

    public function removeItemInCart($rowId)
    {
        $this->confirm('Are you sure you want to remove this item from your cart?', [
            'confirmButtonText' => 'Yes',
            'cancelButtonText' => 'No',
            'position' => 'center',
            'toast' => false,
            'timer' => null,
            'onConfirmed' => 'removedItemInCart'
        ]);

        $this->rowCartId = $rowId;
    }

    public function removedItemInCart()
    {
        Cart::remove($this->rowCartId);

        $this->emit('cart_updated');

        $this->alert('success', 'Item successfully removed in your cart.', [
            'position' => 'center',
            'toast' => false,
            'timer' => 1000
        ]);
    }

    public function applyVoucher()
    {
        $voucher = Voucher::where('code', $this->voucher)->first();

        if( !$voucher ){
            $this->alert('warning', 'Voucher is not valid.', [
                'position' => 'center',
                'toast' => false,
                'timer' => 1500
            ]);
            
            return;
        }

        $userBookingsWithGivenVoucher = request()->user()->bookings()->whereHas('paymentDetail', function($query) {
            $query->where('voucher_code', $this->voucher);
        })->count();

        if( $voucher->is_used || $voucher->remaining == 0 || $userBookingsWithGivenVoucher >= 1 ){
            $this->alert('warning', 'Voucher has already been used.', [
                'position' => 'center',
                'toast' => false,
                'timer' => 1500
            ]);
            
            return;
        }

        if( $voucher->expiry_date && (now() > $voucher->expiry_date) ){
            $this->alert('warning', 'Voucher is ready expired.', [
                'position' => 'center',
                'toast' => false,
                'timer' => 1500
            ]);
            
            return;
        }

        Cart::setGlobalDiscount($voucher->amount);
        $this->subTotal = Cart::priceTotal();
        $this->discount = Cart::discount();
        $this->isVoucherApplied = true;
    }

    public function removeVoucher()
    {
        $this->voucher = null;
        Cart::setGlobalDiscount(0);
        $this->subTotal = Cart::priceTotal();
        $this->discount = Cart::discount();
        $this->isVoucherApplied = false;
    }

    public function checkout()
    {
        $filename = null;

        if( $this->paymentMethodDetails->name != 'Cash' ){
            $this->validate([
                'receipt' => ['required', 'mimes:jpeg,jpg,png', 'max:5000']
            ]);

            $name = Str::random(16);
            $extension = $this->receipt->getClientOriginalExtension();
            $filename = $name.'.'.$extension;

            Storage::disk('root_public')->putFileAs(
                'receipts', $this->receipt, $filename
            );
        }

        $cartItems = Cart::content();
        $cartPriceTotal = Cart::priceTotal(2, ".", "");
        $cartSubTotal = Cart::subTotal(2, ".", "");
        $discount = Cart::discount(2, ".", "");

        if( $cartItems->count() == 0 || !array_key_exists($this->selectedPickupSlot, $this->times) || !array_key_exists($this->selectedDeliverySlot, $this->times) ){
            $this->alert('error', 'An error occurred while processing your request.', [
                'position' => 'center',
                'toast' => false,
                'timer' => 1500
            ]);

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

        $booking->paymentDetail()->create([
            'payment_method_id' => $this->selectedModeOfPayment,
            'total_cost' => ($this->discount != 0) 
                ? (float) $cartSubTotal * 100 
                : (float) $cartPriceTotal * 100,
            'discount' => (float) $discount * 100,
            'voucher_code' => $this->voucher,
            'receipt_attachment' => ($filename) ? "receipts/$filename" : null
        ]);

        $voucher = Voucher::where('code', $this->voucher)->first();

        if( $voucher && $voucher->remaining > 0 && !$voucher->is_used ){
            $voucher->remaining = $voucher->remaining - 1;
            if( $voucher->remaining == 0 ){
                $voucher->is_used = true;
            }
            $voucher->save();
        }

        Cart::destroy();

        $this->reset();

        request()->user()->notify(new NewBooking($booking));

        session()->flash('success', 'Thank you for your booking with us. You can view the details on your Account page.');

        $this->alert('success', 'Booking submitted.', [
            'position' => 'center',
            'toast' => false,
            'timer' => 1500
        ]);

        $this->emit('cart_updated');
    }
}
