<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/19
 * Time: 23:46
 */

namespace Smartbro\Jobs\Email\Booking;

use Smartbro\Mail\BookingReceivedToAdmin;
use Smartbro\Mail\BookingReceivedToCustomer;
use Smartbro\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Configuration;
use Log;
use Illuminate\Support\Facades\Mail;


class BookingReceived implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $reservation;
    public $siteConfig;

    /**
     * BookingReceived constructor.
     * @param Reservation $reservation
     * @param Configuration $configuration
     */
    public function __construct(Reservation $reservation,Configuration $configuration)
    {
        $this->reservation = $reservation;
        $this->siteConfig = $configuration;
    }

    public function handle(){
        if($this->reservation){
            Mail::to($this->siteConfig->contact_email)
                ->send(new BookingReceivedToAdmin($this->reservation));
            Mail::to($this->reservation->email)
                ->send(new BookingReceivedToCustomer($this->reservation));
        }
    }

}