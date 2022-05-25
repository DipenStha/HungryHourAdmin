<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
                 $table->foreign('user_id')->
                 references('id')->on('users')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string("contact_number1");
            $table->string("contact_number_2")->nullable();
            $table->unsignedBigInteger('areas_id');
                $table->foreign('areas_id')->
                references('id')->on('areas')->onDelete('cascade');
            $table->string('street')->nullable();
            $table->string('house_no')->nullable();
            $table->string('nearby_landmark');
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
        Schema::dropIfExists('delivery_addresses');
    }
}
