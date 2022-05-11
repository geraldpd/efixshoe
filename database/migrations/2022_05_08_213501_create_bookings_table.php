<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            //$table->foreignId('payment_detail_id')->constrained();
            $table->string('status');
            $table->timestamp('pickup_date')->nullable()->default(null)->comment('date to which the shoes will be picked up from the client');
            $table->timestamp('delivery_date')->nullable()->default(null)->comment('date to which the shoes will be delivered to the client');
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
        Schema::dropIfExists('bookings');
    }
}
