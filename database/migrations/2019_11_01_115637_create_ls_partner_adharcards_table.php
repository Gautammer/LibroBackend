<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsPartnerAdharcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_partner_adharcards', function (Blueprint $table) {
            $table->bigIncrements('paid');
            $table->unsignedBigInteger('partner_id')->comment('ls_partners table pid');
            $table->foreign('partner_id')
                    ->references('pid')
                    ->on('ls_partners')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('aacid');
            $table->foreign('aacid')
                    ->references('aacid')
                    ->on('ls_adharcards')
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
        Schema::dropIfExists('ls_partner_adharcards');
    }
}
