<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0)->comment('父级 id');
            $table->integer('post_count')->default(0)->comment('帖子数');
            $table->tinyInteger('sort')->default(0)->comment('排序');
            $table->string('name')->index()->comment('名称');
            $table->string('slug', 60)->unique()->comment('缩略名');
            $table->string('description')->nullable()->comment('描述');
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
        Schema::drop('category');
    }
}
