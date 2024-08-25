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
        Schema::create('business_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->date('birth');
            $table->string('account', 30);
            $table->string('password', 512);
            $table->string('address', 50);
            $table->string('detail_address', 50);
            $table->string('tel', 15 );
            $table->char('gender', 1 )->comment('0: 남자, 1: 여자');
            $table->string('business_code', 20);
            $table->string('business_img', 255);
            $table->string('business_name', 50);
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
        Schema::dropIfExists('business_users');
    }
};
