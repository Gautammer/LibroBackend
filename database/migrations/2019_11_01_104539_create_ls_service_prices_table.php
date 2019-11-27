<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsServicePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_service_prices', function (Blueprint $table) {
            $table->bigIncrements('spid');
            $table->unsignedBigInteger('sid')->comment('ls_services table sid');
            $table->foreign('sid')
                    ->references('sid')
                    ->on('ls_services')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('cityid');
            $table->foreign('cityid')
                    ->references('cityid')
                    ->on('ls_cities')
                    ->onDelete('cascade');
            $table->string('sprice')->nullable();
            $table->unsignedBigInteger('updateuid')->comment('updateuid means userid of subadmins')->nullable();
            $table->foreign('updateuid')
                    ->references('uid')
                    ->on('ls_user_registrations')
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
        Schema::dropIfExists('ls_service_prices');
    }
}
