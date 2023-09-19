<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('payment_method_id')->nullable();
            $table->string('last_payment_date')->nullable();
            $table->string('next_payment_date')->nullable();
            $table->string('paid_ammount')->nullable();
            $table->string('balance_ammount')->nullable();
            $table->string('case_file_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accountings');
    }
}
