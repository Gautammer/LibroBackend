<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_services', function (Blueprint $table) {
            $table->bigIncrements('sid');
            $table->string('sname');
            $table->unsignedBigInteger('cid')->comment('ls_categories table cid');
            $table->foreign('cid')
                    ->references('cid')
                    ->on('ls_categories')
                    ->onDelete('cascade');
            $table->string('scid')->comment('subCategory_id')->nullable();
            $table->string('pcid')->comment('productCategory_id')->nullable();
            $table->unsignedBigInteger('stateid');
            $table->foreign('stateid')
                    ->references('stateid')
                    ->on('ls_states')
                    ->onDelete('cascade');
            $table->string('sdetails')->nullable();
            $table->enum('sp_status', ['0', '1'])->default('0')->comment('0 - Special Price does not exist in table LS_SpecialPrice,1 - Exists');
            $table->unsignedBigInteger('uid')->comment('uid means userid of subadmins');
            $table->foreign('uid')
                    ->references('uid')
                    ->on('ls_user_registrations')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('updateuid')->comment('updateuid means userid of subadmins')->nullable();
            $table->foreign('updateuid')
                    ->references('uid')
                    ->on('ls_user_registrations')
                    ->onDelete('cascade');
            $table->enum('status', ['0', '1'])->default('1')->comment('0 - Deactive,1 - Active');
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
        Schema::dropIfExists('ls_services');
    }
}
