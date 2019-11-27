<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_offers', function (Blueprint $table) {
            $table->bigIncrements('offer_id');
            $table->string('offer_name');
            $table->string('offer_img');
            $table->enum('offer_type', ['0', '1','2'])->default('0')->comment('0 - City, 1 - Festival, 2 - Cities');
            $table->enum('offer_status', ['0', '1'])->default('1')->comment('0 - Deactive,1 - Active');
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
        Schema::dropIfExists('ls_offers');
    }
}
