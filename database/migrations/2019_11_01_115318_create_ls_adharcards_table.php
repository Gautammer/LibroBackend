<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsAdharcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_adharcards', function (Blueprint $table) {
            $table->bigIncrements('aacid');
            $table->string('aaimage_front')->nullable();
            $table->string('aaimage_back')->nullable();
            $table->unsignedBigInteger('pid');
            $table->foreign('pid')
                    ->references('pid')
                    ->on('ls_partners')
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
        Schema::dropIfExists('ls_adharcards');
    }
}
