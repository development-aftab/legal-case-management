<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCaseInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('date')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('subject')->nullable();
            $table->string('description')->nullable();
            $table->string('senior_counsel_fees')->nullable();
            $table->string('junior_counsel_fees')->nullable();
            $table->string('instructing_attorney_fees')->nullable();
            $table->string('vat_value')->nullable();
            $table->string('total')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('case_invoices');
    }
}
