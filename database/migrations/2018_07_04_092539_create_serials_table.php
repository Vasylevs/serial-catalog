<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('img')->nullable($value = true);
            $table->text('short_desc')->nullable($value = true);
            $table->text('all_desc')->nullable($value = true);
            $table->text('director')->nullable($value = true);
            $table->text('actors')->nullable($value = true);
            $table->date('date_start')->nullable($value = true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serials');
    }
}
