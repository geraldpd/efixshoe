<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_item_service', function (Blueprint $table) {
            $table->foreignId('booking_item_id');
            $table->foreignId('service_id');
            // $table->foreignId('voucher_id')->nullable()->constrained();
            // $table->integer('group_number')->nullable();//1
            //$table->integer('pairs_of_shoes')->comment('the number of pairs of shoes');
            // $table->timestamps();
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_item_service');
    }
}
