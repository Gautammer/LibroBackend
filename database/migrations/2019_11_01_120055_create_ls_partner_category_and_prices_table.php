<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsPartnerCategoryAndPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_partner_category_and_prices', function (Blueprint $table) {
            $table->bigIncrements('partner_cat_nd_price_id');
            $table->unsignedBigInteger('partner_id')->comment('ls_partners table pid');
            $table->foreign('partner_id')
                    ->references('pid')
                    ->on('ls_partners')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('cid');
            $table->foreign('cid')
                    ->references('cid')
                    ->on('ls_categories')
                    ->onDelete('cascade');
            $table->string('price');
            $table->string('category_name')->nullable();
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
        Schema::dropIfExists('ls_partner_category_and_prices');
    }
}
