<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('billing_firstname', '50')->nullable()->after('customer_id');
            $table->string('billing_lastname', '50')->nullable()->after('billing_firstname');
            $table->string('billing_phone_number', '50')->nullable()->after('billing_lastname');
            $table->string('billing_email', '50')->nullable()->after('billing_phone_number');
            $table->string('shipping_firstname', '50')->nullable()->after('billing_email');
            $table->string('shipping_lastname', '50')->nullable()->after('shipping_firstname');
            $table->string('shipping_phone_number', '50')->nullable()->after('shipping_lastname');
            $table->string('shipping_email', '50')->nullable()->after('shipping_phone_number');
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
