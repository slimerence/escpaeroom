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

    /**
     * @var string 定义要使用的时区
     */
    const DEFAULT_TIME_ZONE = 'Australia/Melbourne';

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

                $startAt = Carbon::createFromFormat(
                    'H:i',
                    $textStart,
                    self::DEFAULT_TIME_ZONE
                );

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
     * 根据给定的日期，返回time slots
     * @param Carbon $date
     * @return array
     */
    public static function GetSpecific(Carbon $date){
        $_startAt = self::START_AT;
        $_duration = self::DURATION;
        $_interval = self::INTERVAL;
        /**
         * 获取给定日期的场数, 8场或者9场
         * @var int $_total
         */
        $_total = self::_calcGivenDateTotal($date);

        $timeSlots = [];
        $totalMinutes = -$_duration - $_interval;

        /**
         * 检查一下, 给定日期，如果是今天
         */
        // 获取当前时间
        $now = Carbon::now(self::DEFAULT_TIME_ZONE);
        $isToday = $date->isToday();

        /**
         * 不是今天，而是今天以后的
         */
        for ($i=0;$i<$_total;$i++){
            /**
             * 首先假定是可以添加的有效时间
             */
            $isAvailableTime = true;

            $totalMinutes += $_duration + $_interval;
            $hour = $_startAt + floor($totalMinutes/$_duration);
            if($hour > 23){
                break;
            }else{
                $minutes = $totalMinutes % $_duration;
                $minutes = $minutes<10 ? '0'.$minutes : ''.$minutes;
                $textStart = $hour.':'.$minutes;

                $startAt = Carbon::createFromFormat(
                    'H:i',
                    $textStart,
                    self::DEFAULT_TIME_ZONE
                );

                if($isToday && $startAt->lessThan($now)){
                    // 指定日期为今天, 并且开始时间小于当前时间, 那么就是无效时间了
                    $isAvailableTime = false;
                }

                if($isAvailableTime){
                    // 有效时间
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
        }

        return $timeSlots;
    }

    /**
     * 根据给定的日期，获取该日期应该有几场
     * @param Carbon $date
     * @return int
     */
    protected static function _calcGivenDateTotal(Carbon $date){
        if($date->isSunday() || $date->isSaturday() || $date->isFriday()){
            return self::TOTAL;
        }else{
            return self::TOTAL - 1;
        }
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