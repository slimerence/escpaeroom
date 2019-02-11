<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Smartbro\Models\Textblock;

class CreateTextblocksTable extends Migration
{
    /**
     *
     */

    public function up()
    {
        Schema::create('textblocks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content')->nullable();
            $table->boolean('display')->default(false);
            $table->timestamps();
        });

        Textblock::create([]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('textblocks');
    }
}
