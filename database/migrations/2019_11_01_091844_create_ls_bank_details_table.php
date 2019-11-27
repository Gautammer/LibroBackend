<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_bank_details', function (Blueprint $table) {
            $table->bigIncrements('bdid');
            $table->string('bd_bankname');
            $table->string('bd_accountno');
            $table->string('bd_ifscCode');
            $table->string('bd_uid')->comment('here uid is primary id of user,partner or SalesExecutive ids');
            $table->enum('bd_userstatus', ['0', '1','2'])->default('0')->comment('0-User,1-Partner,2-SalesExecutive');
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
        Schema::dropIfExists('ls_bank_details');
    }
}
