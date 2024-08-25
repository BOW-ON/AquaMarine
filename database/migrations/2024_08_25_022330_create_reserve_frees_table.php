<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve_frees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('pool_id')->unsigned();
            $table->dateTime('reserve_at');
            $table->integer('reserve_adult');
            $table->integer('reserve_kids');
            $table->char('status', 1)->comment('0 : 예약 완료, 1 : 취소 신청, 2 : 취소 완료, 3 : 환불 신청,  4 : 환불 완료');
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
        Schema::dropIfExists('reserve_frees');
    }
};
