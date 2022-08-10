<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovedOrder extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {dd($order);
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
        )->subject(__('common.approved_order'));
    }
}