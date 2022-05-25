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
            $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->
                references('id')->on('users')->onDelete('cascade');
                $table->unsignedBigInteger('delivery_addresses_id');
                $table->foreign('delivery_addresses_id')->
                references('id')->on('delivery_addresses')->onDelete('cascade');
            $table->dateTime('order_date')->nullable();
            $table->string('sub_total');
            $table->string('delivery_charge');
            $table->string('service_charge');
            $table->string('vat_amount');
            $table->string('order_total');
            $table->string('isPaid');
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
