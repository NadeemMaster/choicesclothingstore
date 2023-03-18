<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('tracking_no');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->string('province');
            $table->string('district');
            $table->string('city');
            $table->string('postcode');
            $table->mediumText('address');
            $table->string('status');
            $table->string('delivery_status');
            $table->string('payment_mode');
            $table->string('payment_status');
            $table->string('session_id')->nullable();
            $table->integer('order_amount');
            $table->dateTime('confirmed_date')->nullable();
            $table->dateTime('canceled_date')->nullable();
            $table->dateTime('delivery_date')->nullable();
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
};
