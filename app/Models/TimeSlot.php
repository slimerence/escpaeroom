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
    const TOTAL     = 9;     // 每天多少轮
    const DURATION  = 60;    // 多长时间, 分钟数
    const INTERVAL  = 30;    // 时间间隔, 分钟数

    public $hour;
    public $minutes;
    public $text_start;
    public $text_end;
    public $duration;
    public $interval;

    /**
     * TimeSlot constructor.
     * @param int $hour
     * @param string $minutes
     * @param string $text_start
     * @param string $text_end
     * @param int $duration
     * @param int $interval
     */
    public function __construct($hour, $minutes, $text_start, $text_end, $duration, $interval)
    {
        $this->hour = $hour;
        $this->minutes = $minutes;
        $this->text_start = $text_start;
        $this->text_end = $text_end;
        $this->duration = $duration;
        $this->interval = $interval;
    }

    /**
     * Get All TimeSlots, 根据给定的值来计算所有可用的 time slots
     * @param int $_startAt
     * @param int $_total
     * @param int $_duration
     * @param int $_interval
     * @return array[TimeSlot]
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

                $timeSlots[] = new TimeSlot(
                    intval($hour),
                    $minutes,
                    $textStart,
                    $startAt->addMinutes($_duration)->format('H:i'),
                    $_duration,
                    $_interval
                );
            }
        }

        return $timeSlots;
    }

    public static function GetSpecific($date){
        $_startAt = self::START_AT;
        $_duration = self::DURATION;
        $_interval = self::INTERVAL;
        $day = $date->dayOfWeek;
        if($day==0||$day>=5){
            $_total=9;
        }else{
            $_total=8;
        }
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

                $timeSlots[] = new TimeSlot(
                    intval($hour),
                    $minutes,
                    $textStart,
                    $startAt->addMinutes($_duration)->format('H:i'),
                    $_duration,
                    $_interval
                );
            }
        }

        return $timeSlots;
    }

    /**
     * 将slot转成文字输出
     * @return string
     */
    public function toOptionText(){
        return 'From '.$this->text_start.' to '.$this->text_end;
    }

    /**
     * 根据给定的日期获取Carbon对象
     * @param string $dateInYMD
     * @param string $fmt
     * @return Carbon
     */
    public function toCarbon($dateInYMD, $fmt = 'Y-m-d'){
        $str = $dateInYMD.' '.$this->hour.':'.$this->minutes;
        return Carbon::createFromFormat($fmt.' H:i',$str,'Australia/Melbourne');
    }
}