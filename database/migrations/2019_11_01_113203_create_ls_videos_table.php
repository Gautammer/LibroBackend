<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_videos', function (Blueprint $table) {
            $table->bigIncrements('video_id');
            $table->string('video_url');
            $table->enum('isServiceVideo', ['0', '1'])->default('0')->comment('0- Home Screen Advertise,1-Service Video');
            $table->integer('sid');
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
        Schema::dropIfExists('ls_videos');
    }
}
