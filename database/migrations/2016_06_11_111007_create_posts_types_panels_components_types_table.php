<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTypesPanelsComponentsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_types_panels_components_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('caption');
            $table->string('presenter_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts_types_panels_components_types');
    }
}
