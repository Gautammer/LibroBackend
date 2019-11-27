<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_hardware', function (Blueprint $table) {
            $table->bigIncrements('hid');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                    ->references('oid')
                    ->on('ls_orders')
                    ->onDelete('cascade');
            $table->string('hname');
            $table->string('hprice');
            $table->string('himg');
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
        Schema::dropIfExists('ls_hardware');
    }
}
