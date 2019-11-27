<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsLocalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_localities', function (Blueprint $table) {
            $table->bigIncrements('localitie_id');
            $table->string('localitie_name');
            $table->unsignedBigInteger('cityid');
            $table->foreign('cityid')
                    ->references('cityid')
                    ->on('ls_cities')
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
        Schema::dropIfExists('ls_localities');
    }
}
