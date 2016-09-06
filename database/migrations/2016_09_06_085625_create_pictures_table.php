<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->default(0);
            $table->string('disk_name')->default('')->index();
            $table->integer('file_size')->default(0);
            $table->string('file_type')->default('');
            $table->string('title')->default('')->index();
            $table->string('description')->default('');
            $table->string('field')->default('');
            $table->integer('sort')->default(0);
            $table->enum('is_publish',[0,1])->default(1);
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
        Schema::drop('pictures');
    }
}