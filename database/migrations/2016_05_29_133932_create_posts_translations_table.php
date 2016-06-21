<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('excerpt');
            $table->text('body');

            $table->string('locale')->index();

            $table->integer('post_id')->unsigned();
            $table->unique(['post_id','locale']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts_translations_table');
    }
}
