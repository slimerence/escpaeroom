<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Smartbro\Models\Reservation as ReservationModel;

class Reservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table){
            $table->increments('id');
            $table->uuid('uuid');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('user_id')->nullable();

            // 不使用 Time slot 了, 因为时间关系
            $table->date('at_date');
            $table->time('at_time');
            $table->dateTime('at')->nullable();
            $table->unsignedSmallInteger('participants');   // 参加人数

            $table->unsignedSmallInteger('status')->default(ReservationModel::STATUS_BOOKED);

            $table->boolean('booking_fee_required')->default(false); // 是否该预定需要预付定金
            $table->string('transaction_number')->nullable(); // 如果需要预付费, 这里保存付费的流水单号

            $table->string('coupon',20)->nullable();    // 如果玩家使用了优惠劵, 填写在这里
            $table->text('notes')->nullable();
            $table->text('why_cancelled')->nullable();  // 如果取消, 这里填写原因

            // 玩家的完成用时
            $table->unsignedInteger('score')->default(0);   // 玩家完成的用时
            $table->unsignedInteger('rating')->default(5);  // 玩家的评价
            $table->text('customer_comment')->nullable();   // 玩家消费之后的留言

            // 是否提醒的功能字段
            $table->boolean('customer_notified')->default(false);
            $table->boolean('shop_owner_notified')->default(false);

            // 为未来预留的字段
            $table->json('extra')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
