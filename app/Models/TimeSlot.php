<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 10/7/18
 * Time: 3:35 PM
 */

namespace Smartbro\Models;

use Carbon\Carbon;

class TimeSlot
{
    const START_AT  = 10;    // 开始时的小时数, 10表示早上10点
    const TOTAL     = 8;     // 每天多少轮
    const DURATION  = 60;    // 多长时间, 分钟数
    const INTERVAL  = 30;    // 时间间隔, 分钟数

    /**
     * Get All TimeSlots, 根据给定的值来计算所有可用的 time slots
     * @param int $_startAt
     * @param int $_total
     * @param int $_duration
     * @param int $_interval
     * @return array
     */
    public static function GetAll($_startAt = self::START_AT, $_total = self::TOTAL, $_duration = self::DURATION, $_interval = self::INTERVAL){
        $timeSlots = [];
        $totalMinutes = -$_duration - $_interval;
        for ($i=0;$i<$_total;$i++){
            $totalMinutes += $_duration + $_interval;
            $hour = $_startAt + floor($totalMinutes/$_duration);

            if($hour > 23){
                break;
            }else{
                $minutes = $totalMinutes % $_duration;
                $minutes = $minutes<10 ? '0'.$minutes : ''.$minutes;
                $textStart = $hour.':'.$minutes;

                $startAt = Carbon::create(1980, 1,1, $hour, $minutes);

                $timeSlots[] = [
                    'hour'=>intval($hour),
                    'minutes'=>$minutes,
                    'text_start'=>$textStart,
                    'text_end'=>$startAt->addMinutes($_duration)->format('H:i'),
                    'duration'=>$_duration,
                    'interval'=>$_interval
                ];
            }
        }
        return $timeSlots;
    }
}