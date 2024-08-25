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
        Schema::create('pools', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('business_id')->unsigned();
            $table->string('name', 255);
            $table->string('address', 255);
            $table->string('tel', 255 );
            $table->string('detail_img', 255);
            $table->string('thumbnail_img', 255);
            $table->string('info_img', 255);
            $table->char('status', 1 )->comment('0: 등록 완료, 1: 수정 신청, 2: 수정 완료, 3: 삭제 신청, 4: 삭제 완료');
            $table->time('open_time');
            $table->time('close_time');
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
        Schema::dropIfExists('pools');
    }
};
