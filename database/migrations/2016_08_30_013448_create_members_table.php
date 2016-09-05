<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('email')->index();
            $table->string('password');
            $table->integer('avatar')->unsigned()->default(0);
            $table->string('introduction')->default("");
            $table->integer('register_time')->unsigned()->default(0);
            $table->string('register_ip')->default("");
            $table->enum('last_login_from',[1,2])->index(); // 来源跟踪：iOS，Android
            $table->integer('last_login_time')->unsigned()->default(0);
            $table->string('last_login_ip')->default("");
            $table->enum('is_block', [0, 1])->default(0)->index();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::drop('members');
    }
}
