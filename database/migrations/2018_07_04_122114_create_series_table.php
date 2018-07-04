<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('season_id');
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');
            $table->string('title');
            $table->string('img');
            $table->text('short_desc');
            $table->string('video');
            $table->date('date_start');
            $table->timestamps();
        });
    }

    /**text
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
