<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CheckoutUser extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->order->user;
        return $this->markdown(
            'emails.order_user',
            [
                'name' => $user->name,
                'email' => $user->email,
                'address' => $this->order->address,
                'phone' => $this->order->phone,
                'orderDetails' => $this->order->orderDetails,
            ]
        )->subject(__('email.order_success'));
    }
}