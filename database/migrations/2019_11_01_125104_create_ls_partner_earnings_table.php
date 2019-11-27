<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsPartnerEarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_partner_earnings', function (Blueprint $table) {
            $table->bigIncrements('earningid');
            $table->unsignedBigInteger('oid');
            $table->foreign('oid')
                    ->references('oid')
                    ->on('ls_orders')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('pid');
            $table->foreign('pid')
                    ->references('pid')
                    ->on('ls_partners')
                    ->onDelete('cascade');
            $table->string('earning_amount')->nullable();
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
        Schema::dropIfExists('ls_partner_earnings');
    }
}
