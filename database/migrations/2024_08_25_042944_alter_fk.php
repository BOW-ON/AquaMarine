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
        Schema::table('pools', function(Blueprint $table) {
            $table->foreign('business_id')->references('id')->on('business_users');
        });

        Schema::table('frees', function(Blueprint $table) {
            $table->foreign('pool_id')->references('id')->on('pools');
        });

        Schema::table('teachers', function(Blueprint $table) {
            $table->foreign('pool_id')->references('id')->on('pools');
        });

        Schema::table('lessons', function(Blueprint $table) {
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });

        Schema::table('pool_reviews', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('business_id')->references('id')->on('business_users');
            $table->foreign('pool_id')->references('id')->on('pools');
        });

        Schema::table('teacher_reviews', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('business_id')->references('id')->on('business_users');
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });

        Schema::table('reserve_frees', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pool_id')->references('id')->on('pools');
        });

        Schema::table('reserve_lessons', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lesson_id')->references('id')->on('lessons');
        });

        Schema::table('review_reports', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pool_review_id')->references('id')->on('pool_reviews');
        });

        Schema::table('review_approves', function(Blueprint $table) {
            $table->foreign('review_report_id')->references('id')->on('review_reports');
        });

        Schema::table('wishes', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pool_id')->references('id')->on('pools');
        });

        Schema::table('questions', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        
        Schema::table('question_manages', function(Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('questions');
        });

        Schema::table('pool_operates', function(Blueprint $table) {
            $table->foreign('pool_id')->references('id')->on('pools');
        });

        Schema::table('free_operates', function(Blueprint $table) {
            $table->foreign('free_id')->references('id')->on('frees');
        });

        Schema::table('lesson_operates', function(Blueprint $table) {
            $table->foreign('lesson_id')->references('id')->on('lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pools', function(Blueprint $table) {
            $table->dropforeign(['business_id']);
        });

        Schema::table('frees', function(Blueprint $table) {
            $table->dropforeign(['pool_id']);
        });

        Schema::table('teachers', function(Blueprint $table) {
            $table->dropforeign(['pool_id']);
        });

        Schema::table('lessons', function(Blueprint $table) {
            $table->dropforeign(['teacher_id']);
        });

        Schema::table('pool_reviews', function(Blueprint $table) {
            $table->dropforeign(['user_id']);
            $table->dropforeign(['business_id']);
            $table->dropforeign(['pool_id']);
        });

        Schema::table('teacher_reviews', function(Blueprint $table) {
            $table->dropforeign(['user_id']);
            $table->dropforeign(['business_id']);
            $table->dropforeign(['teacher_id']);
        });

        Schema::table('reserve_frees', function(Blueprint $table) {
            $table->dropforeign(['user_id']);
            $table->dropforeign(['pool_id']);
        });

        Schema::table('reserve_lessons', function(Blueprint $table) {
            $table->dropforeign(['user_id']);
            $table->dropforeign(['lesson_id']);
        });

        Schema::table('review_reports', function(Blueprint $table) {
            $table->dropforeign(['user_id']);
            $table->dropforeign(['pool_review_id']);
        });

        Schema::table('review_approves', function(Blueprint $table) {
            $table->dropforeign(['review_report_id']);
        });

        Schema::table('wishes', function(Blueprint $table) {
            $table->dropforeign(['user_id']);
            $table->dropforeign(['pool_id']);
        });

        Schema::table('questions', function(Blueprint $table) {
            $table->dropforeign(['user_id']);
        });

        Schema::table('question_manages', function(Blueprint $table) {
            $table->dropforeign(['question_id']);
        });

        Schema::table('pool_operates', function(Blueprint $table) {
            $table->dropforeign(['pool_id']);
        });

        Schema::table('free_operates', function(Blueprint $table) {
            $table->dropforeign(['free_id']);
        });

        Schema::table('lesson_operates', function(Blueprint $table) {
            $table->dropforeign(['lesson_id']);
        });
    }
};
