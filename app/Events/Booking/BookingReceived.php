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

class BookingReceived
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reservation;
    public $adminEmail;

    /**
     * BookingReceived constructor.
     * @param Reservation $reservation
     * @param $adminEmail
     */

    public function __construct(Reservation $reservation, $adminEmail)
    {
        $this->reservation = $reservation;
        $this->adminEmail = $adminEmail;
    }

    /**
     * Get the channels the event should broadcast on.
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return false;
//        return new PrivateChannel('channel-name');
    }
}