<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/19
 * Time: 23:43
 */

namespace Smartbro\Listeners\Booking;

use Carbon\Carbon;
use Smartbro\Events\Booking\BookingReceived;
use Smartbro\Jobs\Email\Booking\BookingReceived as BookingReceivedJob;

class BookingReceivedEventListener
{
    public function __construct()
    {
        //
    }

    public function handle(BookingReceived $event)
    {
        $job = new BookingReceivedJob($event->reservation,$event->siteConfig);
        $job->delay(Carbon::now()->addSecond());
        dispatch($job);
    }
}