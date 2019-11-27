<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_product_categories', function (Blueprint $table) {
            $table->bigIncrements('pcid');
            $table->string('pcname');
            $table->unsignedBigInteger('scid');
            $table->foreign('scid')
                    ->references('scid')
                    ->on('ls_sub_categories')
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
        Schema::dropIfExists('ls_product_categories');
    }
}
