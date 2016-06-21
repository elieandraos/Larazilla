<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_metas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');

            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')
                        ->references('id')
                        ->on('posts')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts_metas');
    }
}
