<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 10/7/18
 * Time: 3:32 PM
 */

namespace Smartbro\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Catalog\Product;
use Smartbro\Models\BlockReservation;
use App\User;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class Reservation extends Model
{
    use SoftDeletes;

    const STATUS_PENDING_PAYMENT    = 1;
    const STATUS_BOOKED             = 2;
    const STATUS_COMPLETED          = 3;
    const STATUS_CANCELLED          = 4;

    protected $fillable = [
        'uuid',
        'product_id',
        'user_id',
        'at_date',
        'at_time',
        'at',
        'participants',
        'status',
        'name',         //预定用户信息
        'phone',
        'email',
        'message',
        'booking_fee_required', // 是否该预定需要预付定金
        'transaction_number',   // 如果需要预付费, 这里保存付费的流水单号
        'coupon',               // 如果玩家使用了优惠劵, 填写在这里
        'notes',
        'why_cancelled',        // 如果取消, 这里填写原因
        'score',                // 玩家完成的用时
        'rating',               // 玩家的评价
        'customer_comment',     // 玩家消费之后的留言
        'customer_notified',
        'shop_owner_notified',
        'extra',                // 为未来预留的字段
    ];

    public $dates = [
        'created_at','updated_at','at'
    ];

    protected $casts = [
        'booking_fee_required'=>'boolean',
        'customer_notified'=>'boolean',
        'shop_owner_notified'=>'boolean',
        'extra'=>'array'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function customer(){
        return $this->belongsTo(User::class);
    }

    public static function Persistent($reservation){
        $selectTime= substr($reservation['at_time'],5,5) ;
        $reservation['at_time'] = $selectTime;
        $reservation['name'] = $reservation['firstname'].' '.$reservation['lastname'];
        $str = $reservation['at_date'].' '.$selectTime;
        $reservation['at']= Carbon::createFromFormat('Y-m-d H:i',$str,'Australia/Melbourne');
        $reservation['status'] = self::STATUS_PENDING_PAYMENT;
        $reservation['booking_fee_required'] = 1;
        if(isset($reservation['email']) && !empty($reservation['email'])){
            // 表示是已经登陆的用户
            $email=$reservation['email'];
            $user = User::GetByEmail($email);
            if(!$user){
                $initPassword='123456';
                $userData = [
                    'uuid'=>Uuid::uuid4()->toString(),
                    'password'=>Hash::make($initPassword),
                    'email'=>$email,
                    'name'=>$reservation['name'],
                    'phone'=>$reservation['phone'],

                ];
                User::create($userData);
            }
            $customer = User::where('email',$reservation['email'])->first();
            $reservation['user_id'] = $customer->id;
        }
        if(isset($reservation['product_id']) && !empty($reservation['product_id'])){
            $product = Product::where('uuid',$reservation['product_id'])->first();
            $reservation['product_id'] = $product->id;
            $reservation['uuid'] = $product->uuid;
        }
        return self::create($reservation);
    }

    /**
     * 检查给定的产品和日期时间是否已经被预定了; 同时根据当前的日期， 决定哪个时间段可以下发
     * @param Product $product
     * @param string $date 日期
     * @param array $timeSlots 最好为一个Carbon类对象的数组
     * @return array
     */
    public static function GetAvailableTimeSlots(Product $product, $date, $timeSlots){

        $availableIndexes = [];
        foreach ($timeSlots as $key=>$timeSlot) {
            /**
             * @var TimeSlot $timeSlot
             */
            $blockcount = BlockReservation::where([
                'product_id'=>$product->id,
                'at'=>$timeSlot->toCarbon($date)
            ])->count();


            $count = self::where([
                'product_id'=>$product->id,
                'at'=>$timeSlot->toCarbon($date)
            ])->count();

            if($count === 0 && $blockcount ==0){
                $availableIndexes[] = $key;
            }
        }
        $result = [];
        foreach ($availableIndexes as $availableIndex) {
            $result[] = $timeSlots[$availableIndex];
        }
        return $result;
    }

    public static function GetPastReservations(){
        $pastreservations = [];
        $reservations =  self::orderBy('at','asc')->orderBy('created_at','asc')->get();
        $today = Carbon::now('Australia/Melbourne');
        foreach ($reservations as $key=>$reservation) {
            if ($reservation->at < $today){
                $pastreservations[] = $reservation;
            }
        }
        return $pastreservations;
    }

    public static function GetComingReservations(){
        $comingreservations = [];
        $reservations =  self::orderBy('at','asc')->orderBy('created_at','asc')->get();
        $today = Carbon::now('Australia/Melbourne');
        foreach ($reservations as $key=>$reservation) {
            if ($reservation->at >= $today){
                $comingreservations[] = $reservation;
            }
        }
        return $comingreservations;
    }

    public static function DeleteReservation($id){
        $reservation = self::find($id);
        if($reservation){
            return $reservation-> forceDelete();
        }else{
            return 0;
        }
    }

    public static function AutoDeleteUnpaid(){
        $reservations = self::where('booking_fee_required',1)->where('status',1)->get();
        $now = Carbon::now();
        if(count($reservations)>0){
            foreach ($reservations as $reservation){
                $interval = $reservation->created_at->diffInMinutes($now);
                if( $interval>10 ){
                    $reservation->forceDelete();
                }
            }
            return 1;
        }
        return 0;
    }
}