<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_trackers', function (Blueprint $table) {
            $table->increments('order_tracker_id');
            $table->integer('order_id');
            $table->string('status', '50')->default('pending');
            $table->text('notes')->nullable();
            $table->integer('created_by_id')->default('0');
            $table->string('created_by_name', '100')->nullable();
            $table->integer('updated_by_id')->default('0');
            $table->string('updated_by_name', '100')->nullable();
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
        Schema::dropIfExists('order_trackers');
    }
}
