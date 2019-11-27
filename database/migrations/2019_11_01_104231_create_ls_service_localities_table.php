<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsServiceLocalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_service_localities', function (Blueprint $table) {
            $table->bigIncrements('slocalitie_id');
            $table->unsignedBigInteger('sid')->comment('ls_services table sid');
            $table->foreign('sid')
                    ->references('sid')
                    ->on('ls_services')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('localitieid');
            $table->foreign('localitieid')
                    ->references('localitie_id')
                    ->on('ls_localities')
                    ->onDelete('cascade');
            $table->string('localitie_name')->nullable();
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
        Schema::dropIfExists('ls_service_localities');
    }
}
