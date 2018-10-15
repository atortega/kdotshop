<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('customers_address', function (Blueprint $table) {
            $table->increments('customers_address_id');
            $table->integer('customer_id')->unique();
            $table->string('billing_address1',100)->nullable();
            $table->string('billing_barangay',100)->nullable();
            $table->string('billing_city',100)->nullable();
            $table->string('billing_province',100)->nullable();
            $table->string('billing_zipcode', 10)->nullable();
            $table->string('billing_country',100)->nullable();
            $table->boolean('shipping_same_as_billing_address');
            $table->string('shipping_address1',100)->nullable();
            $table->string('shipping_barangay',100)->nullable();
            $table->string('shipping_city',100)->nullable();
            $table->string('shipping_province',100)->nullable();
            $table->string('shipping_zipcode',100)->nullable();
            $table->string('shipping_country',100)->nullable();
            $table->timestamps();
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers_address');
    }
}
