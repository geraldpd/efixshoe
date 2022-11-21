<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class NewBooking extends Notification
{
    public $booking; 

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($booking)
    {
        $booking->load('bookingItems', 'bookingItems.services', 'paymentDetail', 'paymentDetail.paymentMethod');
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $paymentMethod = ucwords($this->booking->paymentDetail->paymentMethod->name);
        $totalPrice = number_format($this->booking->paymentDetail->total_cost / 100, 2);

        $items = "";
        foreach( $this->booking->bookingItems as $item ){
            $service = implode(", ", $item->services->pluck('name')->toArray());
            $items .= "Pairs of Shoes: $item->pairs_of_shoes | Service(s): $service <br/>";
        }

        $price = "Payment Method: $paymentMethod <br/> Total Price: PHP $totalPrice <br/>";
        if( $this->booking->paymentDetail->discount ){
            $subTotal = $this->booking->paymentDetail->total_cost + $this->booking->paymentDetail->discount;
            $subTotal = number_format($subTotal / 100, 2);
            $discount = number_format($this->booking->paymentDetail->discount / 100, 2);
            $price .= "Sub Total: $subTotal <br/> Discount: -PHP {$discount}";
        }

        return (new MailMessage)
            ->subject('New Booking submitted')
            ->line('Your new booking has been successfully submitted.')
            ->line("Booking ID: {$this->booking->id} | Status: {$this->booking->status} ")
            ->line(new HtmlString($items))
            ->line(new HtmlString($price))
            ->action('Login Here', config('app.url'));
    }
}
