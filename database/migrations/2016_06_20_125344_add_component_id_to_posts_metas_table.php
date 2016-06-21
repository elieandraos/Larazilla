<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddComponentIdToPostsMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts_metas', function (Blueprint $table) {
            
            $table->integer('component_id')->unsigned();
            $table->foreign('component_id')
                        ->references('id')
                        ->on('posts_types_panels_components')
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
        Schema::table('posts_metas', function (Blueprint $table) {
            $table->dropColumn('component_id');
        });
    }
}
