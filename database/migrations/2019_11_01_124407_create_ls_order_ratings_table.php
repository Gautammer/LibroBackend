<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsOrderRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_order_ratings', function (Blueprint $table) {
            $table->bigIncrements('orderratingid');
            $table->unsignedBigInteger('oid');
            $table->foreign('oid')
                    ->references('oid')
                    ->on('ls_orders')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('uid');
            $table->foreign('uid')
                    ->references('uid')
                    ->on('ls_user_registrations')
                    ->onDelete('cascade');
            $table->string('rate')->nullable();
            $table->string('desc')->nullable();
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
        Schema::dropIfExists('ls_order_ratings');
    }
}
