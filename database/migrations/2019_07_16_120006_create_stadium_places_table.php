<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStadiumPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stadium_places', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('stadium_id');
            $table->string('name', 255);
            $table->char('color', 7);
            $table->unsignedTinyInteger('pos')->default(0);

            $table->foreign('stadium_id')->references('id')->on('stadiums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stadium_places');
    }
}
