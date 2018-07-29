<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/29
 * Time: 2:29
 */

namespace Smartbro\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Catalog\Product;
use Smartbro\Models\Maintain;
use Smartbro\Models\TimeSlot;
use App\User;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class BlockReservation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'maintain_id',
        'at_date',
        'at_time',
        'at',
        'status',
        'notes',
    ];

    public $dates = [
        'created_at','updated_at','at'
    ];


    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function maintain(){
        return $this->belongsTo(Maintain::class);
    }

    public static function CreateBlockReservation($data){
        $maintain = Maintain::CreateMaintain($data);
        $blockreservation = [];
        $blockreservations = [];
        $blockreservation['product_id']=$data['product_id'];
        $blockreservation['maintain_id']=$maintain->id;
        $blockreservation['at_date']=$data['date'];
        $slots = TimeSlot::GetAll();
        /**
         * 获取到阻止预定的起始和终止时间
         * 转换成carbon对象
         */
        $start_str = $data['date'].' '.$data['start'];
        $end_str = $data['date'].' '.$data['end'];
        $start=Carbon::createFromFormat('Y-m-d H:i',$start_str,'Australia/Melbourne');
        $end=Carbon::createFromFormat('Y-m-d H:i',$end_str,'Australia/Melbourne');
        /**
         * 对时间进行处理 计算出初始时间属于哪一个timeslot时间段
         * 并获取相关timeslot的开始时间
         */
        foreach ($slots as $slot){
            $slotbegin_str = $data['date'].' '.$slot->text_start;
            $slotbegin=Carbon::createFromFormat('Y-m-d H:i',$slotbegin_str,'Australia/Melbourne');
            $slotend_str = $data['date'].' '.$slot->text_end;
            $slotend=Carbon::createFromFormat('Y-m-d H:i',$slotend_str,'Australia/Melbourne');
            if ($slotbegin->between($start,$end)||$slotend->between($start,$end)){
                $blockreservation['at_time'] = $slot->text_start;
                $blockreservation['at'] = $slotbegin;
                $blockreservations[] = $blockreservation;
                BlockReservation::create($blockreservation);
            }
        }
        return $blockreservations;
    }
}