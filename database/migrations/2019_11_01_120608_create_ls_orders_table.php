<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ls_orders', function (Blueprint $table) {
            $table->bigIncrements('oid');
            $table->unsignedBigInteger('uid');
            $table->foreign('uid')
                    ->references('uid')
                    ->on('ls_user_registrations')
                    ->onDelete('cascade');
            $table->string('orderDescription')->nullable();
            $table->enum('oPaymentMode', ['0', '1'])->default('0')->comment('0-COD,1-Online');
            $table->string('oTransectionKey')->nullable()->comment('if paymentMode Online then TransectionKey Genrate');
            $table->string('oPromocode')->nullable();
            $table->integer('oPromocodeId')->nullable()->comment('promoid of ls_promo_codes');
            $table->string('oTotalAmount')->nullable();
            $table->string('oSubTotalAmount')->nullable();
            $table->string('oDiscountAmount')->nullable();
            $table->string('oPincode')->nullable();
            $table->string('uaid')->comment('user_address')->nullable();
            $table->string('oUniqueId')->nullable();
            $table->string('orderSpecialIns')->nullable()->comment('Order Special Instructions');
            $table->enum('isOrderEdited', ['0', '1'])->default('0')->comment('0-No,1-Yes');
            $table->enum('ostatus', ['0', '1','2','3','4'])->default('0')->comment('0-Pending,1-Accept,2-Descline,3-Process,4-Assign,5-Complete');
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
        Schema::dropIfExists('ls_orders');
    }
}
