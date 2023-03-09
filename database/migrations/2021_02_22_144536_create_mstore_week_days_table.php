<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstoreWeekDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstore_week_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id')->nullable();

            $table->foreign('store_id')->references('id')->on('mstores');
            $table->unsignedBigInteger('day_id')->nullable();

            $table->foreign('day_id')->references('id')->on('week_days');
            $table->time('start_at')->nullable();
            $table->time('end_at')->nullable();
            $table->date('month')->nullable();
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
        Schema::dropIfExists('mstore_week_days');
    }
}
