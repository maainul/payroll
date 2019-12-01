<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_salary', function (Blueprint $table) {
            $table->increments('salary_id');
            $table->integer('employee_id');
            $table->integer('office_id');
            $table->integer('unit_id');
            $table->integer('grade_id');
            $table->integer('designation_id');
            $table->integer('department_id');
            $table->integer('bonus');
            $table->integer('fine');
            $table->integer('total_salary');
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
        Schema::dropIfExists('tbl_salary');
    }
}
