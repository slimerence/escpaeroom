<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 10/7/18
 * Time: 5:38 PM
 */

namespace Smartbro\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Utils\JsonBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Smartbro\Listeners\Booking\BookingReceivedEventListener;
use Smartbro\Mail\BookingReceivedToAdmin;
use Smartbro\Mail\BookingReceivedToCustomer;
use Illuminate\Support\Facades\Mail;
use Smartbro\Jobs\Email\Booking\BookingReceived as BookingReceivedJob;
use Smartbro\Models\Reservation;
use Smartbro\Models\TimeSlot;
use App\Models\Catalog\Product;
use App\Models\Configuration;
use Carbon\Carbon;

class ApiController extends Controller
{
    /**
     * 根据提交的product 和 日期 获取依然可以被预定的时间段文字
     * 为了方便, 将timeSlots对象数据和option可用的文字值数组都返回
     * @param Request $request
     * @return string
     */
    public function get_available_time_slot(Request $request){
        $product = Product::GetByUuid($request->get('p'));
        $dateString = substr($request->get('d'),0,10);

        $date = Carbon::createFromFormat(
            'Y-m-d',
            $dateString,
            TimeSlot::DEFAULT_TIME_ZONE
        );
        
        $slots = Reservation::GetAvailableTimeSlots(
            $product,
            $request->get('d'),
            TimeSlot::GetSpecific($date)
        );

        $result = [];
        foreach ($slots as $timeSlot) {
            /* @var $timeSlot TimeSlot */
            $result[] = $timeSlot->toOptionText();
        }

        return count($result)>0 ?
            JsonBuilder::Success(['s'=>$slots,'r'=>$result]) :
            JsonBuilder::Error();
    }

    /**
     * 用户提交了预定表单
     * 并不会生成新的用户, 而是将用户信息放入到reservation中
     * @param Request $request
     * @return string
     */
    public function booking_confirm(Request $request){
        $reservation = $request->get('reservation');
        if($reservation = Reservation::Persistent($reservation)){
            Mail::to($this->siteConfig->contact_email)
                ->send(new BookingReceivedToAdmin($reservation));
            Mail::to($reservation->email)
                ->send(new BookingReceivedToCustomer($reservation));
            return view(_get_frontend_theme_path('pages.confirmation'));
        }
        return back()->with('error','Something wrong with the server!');
    }
}