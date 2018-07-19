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
use Smartbro\Events\Booking\BookingReceived;
use Smartbro\Models\Reservation;
use Smartbro\Models\TimeSlot;
use App\Models\Catalog\Product;

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
        $slots = Reservation::GetAvailableTimeSlots($product,
            $request->get('d'),
            TimeSlot::GetAll()
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

    public function booking_confirm(Request $request){
        $reservation = $request->get('reservation');
        if($reservation = Reservation::Persistent($reservation)){
            // 通知网站管理员和用户
            event(new BookingReceived($reservation, $this->siteConfig->contact_email));

            return JsonBuilder::Success();
        }
        return JsonBuilder::Error();
    }
}