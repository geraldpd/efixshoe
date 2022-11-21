<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->dropForeign('vouchers_service_id_foreign');
            $table->dropColumn(['service_id', 'batch']);
            $table->integer('quantity')->after('code');
            $table->integer('remaining')->after('quantity');
            $table->integer('amount')->after('remaining')->comment('percent amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('vouchers', ['quantity', 'remaining', 'amount']);
    }
}
