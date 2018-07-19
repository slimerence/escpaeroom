<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/19
 * Time: 16:45
 */

namespace Smartbro\Events\Booking;

use Smartbro\Models\Reservation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Configuration;

class BookingReceived
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reservation;
    public $siteConfig;

    /**
     * BookingReceived constructor.
     * @param Reservation $reservation
     * @param Configuration $configuration
     */

    public function __construct(Reservation $reservation, Configuration $configuration)
    {
        $this->reservation = $reservation;
        $this->siteConfig = $configuration;
    }

    /**
     * @return bool
     */
    public function broadcastOn()
    {
        return false;
//        return new PrivateChannel('channel-name');
    }
}