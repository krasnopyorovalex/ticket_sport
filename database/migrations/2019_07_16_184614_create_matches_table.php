<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('stage_id');
            $table->unsignedBigInteger('stadium_id')->nullable();
            $table->unsignedBigInteger('team_first_id');
            $table->unsignedBigInteger('team_second_id')->nullable();
            $table->text('text')->nullable();
            $table->enum('is_popular', [0,1])->default(0);
            $table->enum('status', [0,1])->default(1);
            $table->timestamp('start_datetime')->nullable();

            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
            $table->foreign('stadium_id')->references('id')->on('stadiums')->onDelete('set null');
            $table->foreign('team_first_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team_second_id')->references('id')->on('teams')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
