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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_id')->unsigned();
            $table->string('lesson_name', 255);
            $table->string('detail_img', 255);
            $table->time('start_time');
            $table->time('end_time');
            $table->bigInteger('price');
            $table->integer('capacity');
            $table->string('status', 1)->comment('0: 등록 완료, 1: 수정 신청, 2: 수정 완료, 3: 삭제 신청, 4: 삭제 완료');
            $table->char('lesson_age', 1)->comment('0 : 전체, 1 : 성인, 2: 청소년, 3: 기타');
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
        Schema::dropIfExists('lessons');
    }
};
