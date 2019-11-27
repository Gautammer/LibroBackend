<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsOrderHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_order_hardware', function (Blueprint $table) {
            $table->bigIncrements('ohid');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                    ->references('oid')
                    ->on('ls_orders')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('hardware_id');
            $table->foreign('hardware_id')
                    ->references('hid')
                    ->on('ls_hardware')
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
        Schema::dropIfExists('ls_order_hardware');
    }
}
