<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_partners', function (Blueprint $table) {
            $table->bigIncrements('pid');
            $table->string('pname');
            $table->string('pmobileno')->unique();
            $table->timestamp('mobileno_verified_at')->nullable();
            $table->string('otp')->nullable()->comment('6-Digit Number');
            $table->enum('pgender', ['Male', 'Female'])->default('Male');
            $table->string('pemail')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
            // $table->enum('usertype', ['0', '1','2'])->default('1')->comment('0-MasterAdmin,1-User,2-SubAdmin');
            $table->string('pAddress')->nullable();
            $table->string('pPincode')->nullable();
            $table->string('uprofilepic')->nullable();
            $table->string('pExperiance')->nullable();
            $table->string('pExpartise')->nullable();
            $table->enum('is_active', ['0', '1'])->default('0')->comment('0-Not Active User,1-Active User (Mobile Number is Verified)');
            $table->enum('is_approved', ['0', '1'])->default('0')->comment('0-Not Approve by admin,1-Approved User (Approved by SuperAdmin)');
            $table->string('forget_password_token')->nullable();
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
        Schema::dropIfExists('ls_partners');
    }
}
