<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsSalesExecutivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_sales_executives', function (Blueprint $table) {
            $table->bigIncrements('seid');
            $table->string('seName');
            $table->string('seMobileno');
            $table->string('seAddress')->nullable();
            $table->unsignedBigInteger('stateid');
            $table->foreign('stateid')
                    ->references('stateid')
                    ->on('ls_states')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('cityid');
            $table->foreign('cityid')
                    ->references('cityid')
                    ->on('ls_cities')
                    ->onDelete('cascade');
            $table->string('sePassword');
            $table->string('seProfilePic')->nullable();
            $table->string('seCode')->nullable();
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
        Schema::dropIfExists('ls_sales_executives');
    }
}
