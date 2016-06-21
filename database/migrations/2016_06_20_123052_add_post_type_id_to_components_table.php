<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostTypeIdToComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts_types_panels_components', function (Blueprint $table) {
            
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
        Schema::table('posts_types_panels_components', function (Blueprint $table) {
            $table->dropColumn('post_type_id');
        });
    }
}
