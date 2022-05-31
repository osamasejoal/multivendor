<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_summaries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('coupon_code')->nullable();
            $table->integer('cart_total');
            $table->integer('discount_total')->default(0);
            $table->integer('sub_total');
            $table->integer('shipping');
            $table->integer('grand_total');
            $table->integer('payment_option')->comment('1 = cash on delivery; 2 = online payment;');
            $table->integer('payment_status')->default(0)->comment('0 = due; 1 = paid');
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
        Schema::dropIfExists('order_summaries');
    }
}
