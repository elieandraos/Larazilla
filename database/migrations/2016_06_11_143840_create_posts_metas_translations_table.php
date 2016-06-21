<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsMetasTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_metas_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('value');

            $table->string('locale')->index();

            $table->integer('post_meta_id')->unsigned();
            $table->unique(['post_meta_id','locale']);
            $table->foreign('post_meta_id')->references('id')->on('posts_metas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts_metas_translations');
    }
}
