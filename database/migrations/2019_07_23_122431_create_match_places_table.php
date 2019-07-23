<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_places', static function (Blueprint $table) {
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('stadium_place_id');

            $table->string('price', 127)->nullable();

            $table->primary(['match_id', 'stadium_place_id']);

            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
            $table->foreign('stadium_place_id')->references('id')->on('stadium_places')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_places');
    }
}
