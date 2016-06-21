<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTypesPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_types_panels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('position'); //normal, side
            $table->string('fa_icon');
            $table->integer('order');

            $table->integer('post_type_id')->unsigned();
            $table->foreign('post_type_id')
                        ->references('id')
                        ->on('posts_types')
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
        Schema::drop('posts_types_panels');
    }
}
