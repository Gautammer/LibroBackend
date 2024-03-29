<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_sub_categories', function (Blueprint $table) {
            $table->bigIncrements('scid');
            $table->string('scname');
            $table->unsignedBigInteger('cid');
            $table->foreign('cid')
                    ->references('cid')
                    ->on('ls_categories')
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
        Schema::dropIfExists('ls_sub_categories');
    }
}
