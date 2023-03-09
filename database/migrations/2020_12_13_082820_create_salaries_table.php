<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
            ;  $table->unsignedBigInteger('edit_id')->nullable();
            $table->foreign('edit_id')->references('id')->on('users');
            $table->date('month');
            $table->double('pons')->default(0);
            $table->double('deductions')->default(0);
            $table->double('total')->default(0);
            $table->tinyInteger('is_payed')->default(0);
            $table->text('des')->nullable();
            $table->date('last_change')->nullable();
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
        Schema::dropIfExists('salaries');
    }
}
