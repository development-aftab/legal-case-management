<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCaseFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_files', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('case_number')->nullable();
            $table->string('name_of_parties')->nullable();
            $table->string('instruction_attorney_id')->nullable();
            $table->string('junior_attorney_id')->nullable();
            $table->string('senior_counsel_id')->nullable();
            $table->string('king_counsel_id')->nullable();
            $table->string('retainer_agreement')->nullable();
            $table->string('type_of_matter_id')->nullable();
            $table->text('case_condition')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('case_files');
    }
}
