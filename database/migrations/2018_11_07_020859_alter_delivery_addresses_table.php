<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDeliveryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_addresses', function (Blueprint $table) {
            $table->string('address', '100')->after('middle_initial')->nullable();
            $table->string('zipcode', '100')->nullable()->change();
            $table->string('barangay', '100')->nullable()->change();
            $table->dropColumn('municipality', 'middle_initial');
            $table->string('city', '100')->nullable()->change();
            $table->string('province', '100')->nullable()->change();
            $table->string('country', '100')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
