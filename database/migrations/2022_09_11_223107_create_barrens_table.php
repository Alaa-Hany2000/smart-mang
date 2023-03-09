<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barrens', function (Blueprint $table) {
            $table->id();
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->unsignedBigInteger('by_id')->nullable();
            $table->unsignedBigInteger('suppler_id')->nullable();
            $table->unsignedBigInteger('lsuppler_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('lcustomer_id')->nullable();
            $table->unsignedBigInteger('hbill_id')->nullable();
            $table->unsignedBigInteger('lbill_id')->nullable();
            $table->unsignedBigInteger('hsbill_id')->nullable();
            $table->unsignedBigInteger('lsbill_id')->nullable();
            $table->unsignedBigInteger('hProductS_id')->nullable();
            $table->unsignedBigInteger('hProductB_id')->nullable();
            $table->unsignedBigInteger('lProductS_id')->nullable();
            $table->unsignedBigInteger('lProductB_id')->nullable();
            $table->unsignedBigInteger('hProductD_id')->nullable();
            $table->unsignedBigInteger('lProductD_id')->nullable();
            $table->unsignedBigInteger('hBalance_id')->nullable();
            $table->unsignedBigInteger('hsBalance_id')->nullable();
            $table->double('total_money')->default(0);
            $table->double('total_sales')->default(0);
            $table->double('total_debt')->default(0);
            $table->double('total_term')->default(0);
            $table->double('total_lost')->default(0);
            $table->double('total_profit')->default(0);
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
        Schema::dropIfExists('barrens');
    }
}
