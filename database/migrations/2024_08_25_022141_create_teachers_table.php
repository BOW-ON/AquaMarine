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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pool_id')->unsigned();
            $table->string('name', 255);
            $table->string('profile_img', 255);
            $table->string('resume_img', 255);
            $table->string('resume_file', 255);
            $table->char('status', 1)->comment('0: 등록 완료, 1: 수정 신청, 2: 수정 완료, 3: 삭제 신청, 4: 삭제 완료');
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
        Schema::dropIfExists('teachers');
    }
};
