<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/21
 * Time: 23:12
 */

namespace Smartbro\Mail;

use Smartbro\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class BookingReceivedToCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation=$reservation;
    }

    public function build()
    {
        return $this->subject('The One Room Escape: Your booking fee invoice')
            ->markdown(_get_frontend_theme_path('emails.reservation.received.invoice'));
    }
}