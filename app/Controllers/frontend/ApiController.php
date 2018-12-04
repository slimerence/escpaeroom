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
use Smartbro\Mail\InvoiceToCustomer;
use Illuminate\Support\Facades\Mail;
use Smartbro\Jobs\Email\Booking\BookingReceived as BookingReceivedJob;
use Smartbro\Models\Reservation;
use Smartbro\Models\TimeSlot;
use App\Models\Catalog\Product;
use App\Models\Configuration;
use Carbon\Carbon;
use Smartbro\Models\Merchant;
use Smartbro\Models\Parser;

class ApiController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
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
     * @throws
     */

    public function booking_confirm(Request $request){
        $reservation = $request->get('reservation');
        $token = $request->input('form_token');
        /**
         * 用于防止客户多次提交相同订单
         */
        if (cache()->has($token)) {
            return back()->with('status', 'Please do not try to repeat submit the reservation!');
        }
        cache([$token => 'value'], 1);

        if($reservation = Reservation::Persistent($reservation)){
            $this->dataForView['reservation'] = $reservation;
            //生成新的订单编号
            $orderid = $reservation->created_at->format('ymdhis');
            $response = json_decode($this->try_curl($orderid));
            //dd($response->session);
            $this->dataForView['transaction_session'] = $response->session->id;
            $this->dataForView['transaction_number'] = $orderid;
            Reservation::find($reservation->id)->update(['transaction_number'=> $orderid]);
            return view(_get_frontend_theme_path('catalog.payment'), $this->dataForView);
        }else{
            return back()->with('error','Something wrong with the server!');
        }
        
    }

    public function booking_cancel($id){
        $reservation = Reservation::find($id);
        Reservation::DeleteReservation($id);
        return redirect('/');
    }

    public function booking_remove(Request $request){
        $id = $request->get('id');
        Reservation::DeleteReservation($id);
        return redirect('/');
    }

    public function success($id){
        $reservation = Reservation::find($id);
        if($reservation){
            $reservation->update(['status'=> Reservation::STATUS_COMPLETED ]);
            Mail::to($this->siteConfig->contact_email)
            ->send(new BookingReceivedToAdmin($reservation));
            Mail::to($reservation->email)
            ->send(new BookingReceivedToCustomer($reservation));
            return view(_get_frontend_theme_path('pages.confirmation'));
        }
        return back()->with('error','Something wrong with the server!');
    }

    public function pay(){
        return view(_get_frontend_theme_path('catalog.payment'));
    }

    public function try_curl($orderid){
        $merchantObj = new Merchant();
        //dd($merchantObj);
        $requestData = [
            'apiOperation' =>'CREATE_CHECKOUT_SESSION',
            'order' => [
                "id" => $orderid,
                "currency" => $merchantObj->GetCurrency(),
                "amount"=>'50',
            ],
        ];
        $jsonRequest = json_encode($requestData);
        $ch = curl_init($merchantObj->GetCheckoutSessionUrl());
        curl_setopt($ch, CURLOPT_USERPWD, $merchantObj->GetApiUsername() . ":" . $merchantObj->GetPassword());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonRequest);

        // execute!
        $response = curl_exec($ch);

        // close the connection, release resources used
        curl_close($ch);

        return $response;
        // do anything you want with your response
        //dd($response);
    }

    public function autoclean(){
        Reservation::AutoDeleteUnpaid();
    }
}