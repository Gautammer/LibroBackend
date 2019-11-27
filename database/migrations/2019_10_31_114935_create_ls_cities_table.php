<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_cities', function (Blueprint $table) {
            $table->bigIncrements('cityid');
            $table->string('cityname');
            $table->unsignedBigInteger('stateid');
            $table->foreign('stateid')
                    ->references('stateid')
                    ->on('ls_states')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('ls_cities');
    }
}
