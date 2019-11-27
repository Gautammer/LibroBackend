<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsOrderImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_order_images', function (Blueprint $table) {
            $table->bigIncrements('oiid');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')
                    ->references('uid')
                    ->on('ls_user_registrations')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                    ->references('oid')
                    ->on('ls_orders')
                    ->onDelete('cascade');
            $table->enum('status', ['0', '1'])->default('1')->comment('1 - Active,0 - Descline');
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
        Schema::dropIfExists('ls_order_images');
    }
}
