<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddComponentTypeIdToComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts_types_panels_components', function (Blueprint $table) {
            $table->dropColumn('type');

            $table->integer('component_type_id')->unsigned();
            $table->foreign('component_type_id')
                        ->references('id')
                        ->on('posts_types_panels_components_types')
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
            $table->string('type'); 
            $table->dropUnique('posts_types_panels_components_component_type_id_foreign');
            $table->dropColumn('component_type_id');
        });
    }
}
