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
        Schema::create('review_reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('pool_review_id')->unsigned();
            $table->bigInteger('teacher_review');
            $table->string('content', 255);
            $table->integer('report')->comment('0: 도배,  1: 영리성, 2:욕설, 3:기타');
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
        Schema::dropIfExists('review_reports');
    }
};
