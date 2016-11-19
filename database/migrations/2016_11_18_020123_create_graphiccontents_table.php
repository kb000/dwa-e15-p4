<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraphiccontentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphic_contents', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();

            # The FK to Graphics
            $table->integer('graphic_id')->unsigned();
            $table->foreign('graphic_id')->references('id')->on('graphics');
            
            # The rest of the fields
            $table->binary('data');
            $table->binary('rasterData')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('graphic_contents');
    }
}
