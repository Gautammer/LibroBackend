<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsPromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_promo_codes', function (Blueprint $table) {
            $table->bigIncrements('promoid');
            $table->string('name');
            $table->string('number');
            $table->string('role');
            $table->string('promocode');
            $table->string('percentage');
            $table->string('expire_date');
            $table->string('mobile');
            $table->enum('status', ['0', '1'])->default('1')->comment('0 - Deactive,1 - Active');
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
        Schema::dropIfExists('ls_promo_codes');
    }
}
