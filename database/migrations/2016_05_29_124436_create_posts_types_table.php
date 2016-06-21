<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('singular_name');
            $table->string('plural_name');
            $table->string('slug');
            $table->string('fa_icon')->default('fa fa-file');
            $table->text('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts_types');
    }
}
