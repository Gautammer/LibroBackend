<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsOfferServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_offer_services', function (Blueprint $table) {
            $table->bigIncrements('osid');
            $table->unsignedBigInteger('offer_id')->comment('ls_offers table offer_id');
            $table->foreign('offer_id')
                    ->references('offer_id')
                    ->on('ls_offers')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('sid')->comment('ls_services table sid');
            $table->foreign('sid')
                    ->references('sid')
                    ->on('ls_services')
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
        Schema::dropIfExists('ls_offer_services');
    }
}
