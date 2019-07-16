<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('championship_id');
            $table->string('name', 255);
            $table->unsignedTinyInteger('pos')->default(0);

            $table->foreign('championship_id')->references('id')->on('championships')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stages');
    }
}
