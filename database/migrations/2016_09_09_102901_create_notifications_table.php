<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_member_id')->default(0)->index();
            $table->integer('member_id')->default(0)->index();
            $table->integer('post_id')->default(0)->index();
            $table->integer('comment_id')->default(0)->index();
            $table->text('content')->nullable();
            $table->tinyInteger('type')->default(1)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notifications');
    }
}
