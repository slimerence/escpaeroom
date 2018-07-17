<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 10/7/18
 * Time: 3:32 PM
 */

namespace Smartbro\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Catalog\Product;
use App\User;

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

}