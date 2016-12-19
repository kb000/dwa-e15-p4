<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraphicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphics', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();

            # The rest of the fields...
            $table->string('title');
            $table->text('description');
            # Base64 encoded SHA256.
            $table->string('authKey', 43);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Log::info("Running create_graphics_table->down()");
        Schema::drop('graphics');
    }
}
