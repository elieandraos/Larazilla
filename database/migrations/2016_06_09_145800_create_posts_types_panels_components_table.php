<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTypesPanelsComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_types_panels_components', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('meta_key'); //used to retrieve post metas
            $table->string('html_name'); //used in http requests
            $table->string('html_id');
            $table->string('css_class');
            $table->string('type'); // input type
            $table->integer('order')->default(0);
            $table->text('options');

            $table->integer('post_type_panel_id')->unsigned();
            $table->foreign('post_type_panel_id')
                        ->references('id')
                        ->on('posts_types_panels')
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
        Schema::drop('posts_types_panels_components');
    }
}
