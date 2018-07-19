<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/19
 * Time: 23:55
 */

namespace Smartbro\Mail;

use Smartbro\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class BookingReceivedToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

   public function __construct(Reservation $reservation)
   {
       $this->reservation=$reservation;
   }

    public function build()
    {
        return $this->subject('The One Room Escape: You got a new booking from the website')
            ->markdown(_get_frontend_theme_path('emails.reservation.received.to_admin'));
    }
}