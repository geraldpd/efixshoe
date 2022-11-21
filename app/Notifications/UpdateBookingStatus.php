<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateBookingStatus extends Notification
{
    public $booking; 

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($booking)
    {
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
        $subject = 'Booking Status Updated';
        $text = "The status of your booking has been updated.";

        if( $this->booking->status == 'DECLINED' ){
            $subject = 'Booking Declined';
            $text = "Your booking has been declined due to unavailability of services. We will contact you for any payment-related concerns. Thank you for your kind consideration.";
        }

        if( $this->booking->status == 'COMPLETED' ){
            $subject = 'Booking Completed';
            $text = "Your booking has been completed. Please contact us if you have any concerns. Thank you.";
        }

        return (new MailMessage)
            ->subject($subject)
            ->line($text)
            ->line("Booking ID: {$this->booking->id}")
            ->line("Status: {$this->booking->status}")
            ->line("Pickup Date: {$this->booking->pickup_date->format('Y-m-d')}")
            ->line("Delivery Date: {$this->booking->delivery_date->format('Y-m-d')}")
            ->action('Login Here', config('app.url'));
    }
}
