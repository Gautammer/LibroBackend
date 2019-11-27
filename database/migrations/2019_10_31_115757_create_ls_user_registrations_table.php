<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsUserRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_user_registrations', function (Blueprint $table) {
            $table->bigIncrements('uid');
            $table->string('uname');
            $table->string('umobileno')->unique();
            $table->timestamp('mobileno_verified_at')->nullable();
            $table->string('otp')->nullable()->comment('6-Digit Number');
            $table->enum('ugender', ['Male', 'Female'])->default('Male');
            $table->string('uemail')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('uprofilepic')->nullable();
            $table->string('urefferalCode')->nullable();
            $table->unsignedBigInteger('stateid');
            $table->foreign('stateid')
                    ->references('stateid')
                    ->on('ls_states')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('cityid');
            $table->foreign('cityid')
                    ->references('cityid')
                    ->on('ls_cities')
                    ->onDelete('cascade');
            $table->enum('usertype', ['0', '1','2'])->default('1')->comment('0-MasterAdmin,1-User,2-SubAdmin');
            $table->enum('is_active', ['0', '1'])->default('0')->comment('0-Not Active User,1-Active User (Mobile Number is Verified)');
            $table->string('forget_password_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('ls_user_registrations');
    }
}
