<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsPromoCodeCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_promo_code_cities', function (Blueprint $table) {
            $table->bigIncrements('promo_cities_id');
            $table->unsignedBigInteger('cityid');
            $table->foreign('cityid')
                    ->references('cityid')
                    ->on('ls_cities')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('promoid');
            $table->foreign('promoid')
                    ->references('promoid')
                    ->on('ls_promo_codes')
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
        Schema::dropIfExists('ls_promo_code_cities');
    }
}
