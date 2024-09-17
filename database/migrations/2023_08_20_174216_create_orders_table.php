<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('c_name')->nullable();
            $table->string('c_phone')->nullable();
            $table->string('c_country')->nullable();
            $table->text('c_shipping_address')->nullable();
            $table->string('c_email')->nullable();
            $table->string('c_zipcode')->nullable();
            $table->string('c_extra_phone')->nullable();
            $table->string('c_city')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('coupon_discount')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('total')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('date')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
