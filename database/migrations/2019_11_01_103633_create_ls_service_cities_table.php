<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsServiceCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_service_cities', function (Blueprint $table) {
            $table->bigIncrements('scityid');
            $table->unsignedBigInteger('sid')->comment('ls_services table sid');
            $table->foreign('sid')
                    ->references('sid')
                    ->on('ls_services')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('cityid');
            $table->foreign('cityid')
                    ->references('cityid')
                    ->on('ls_cities')
                    ->onDelete('cascade');
            $table->string('cityname')->nullable();
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
        Schema::dropIfExists('ls_service_cities');
    }
}
