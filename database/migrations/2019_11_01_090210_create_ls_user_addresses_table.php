<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_user_addresses', function (Blueprint $table) {
            $table->bigIncrements('uaid');
            $table->unsignedBigInteger('uid');
            $table->foreign('uid')
                    ->references('uid')
                    ->on('ls_user_registrations')
                    ->onDelete('cascade');
            $table->string('uaddress')->nullable();
            $table->enum('uatype', ['0', '1','2'])
                    ->default('0')
                    ->comment('0-Home,1-Work,2-Other');
            $table->unsignedBigInteger('ustateid');
            $table->foreign('ustateid')
                    ->references('stateid')
                    ->on('ls_states')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('ucityid');
            $table->foreign('ucityid')
                    ->references('cityid')
                    ->on('ls_cities')
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
        Schema::dropIfExists('ls_user_addresses');
    }
}
