<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('content');
            $table->integer('member_id')->unsigned()->default(0)->index();
            $table->integer('category_id')->unsigned()->default(0)->index();
            $table->integer('comment_count')->default(0)->index();
            $table->integer('view_count')->unsigned()->default(0)->index();
            $table->integer('vote_count')->default(0)->index();
            $table->integer('last_comment_member_id')->unsigned()->default(0)->index();
            $table->dateTime('last_comment_at');
            $table->enum('is_top', [1,  0])->default(0)->index();
            $table->enum('is_block', [1,  0])->default(0)->index();
            $table->enum('is_good', [1,  0])->default(0)->index();
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
        Schema::drop('posts');
    }
}
