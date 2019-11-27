<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsSubadminPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_subadmin_permissions', function (Blueprint $table) {
            $table->bigIncrements('subadmin_pid');
            $table->unsignedBigInteger('uid')->comment('here uid is subadmin_id of ls_user_registrations');
            $table->foreign('uid')
                    ->references('uid')
                    ->on('ls_user_registrations')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id')
                    ->references('permission_id')
                    ->on('ls_permissions')
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
        Schema::dropIfExists('ls_subadmin_permissions');
    }
}
