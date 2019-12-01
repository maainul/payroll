<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_employee', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->integer('unit_id');
            $table->integer('designation_id');
            $table->integer('grade_id');
            $table->string('employee_name');
            $table->string('employee_phone');
            $table->string('employee_email');
            $table->date('employee_date_of_birth');
            $table->date('employee_join_date');
            $table->string('employee_nid');
            $table->string('employee_father_name');
            $table->string('employee_mother_name');
            $table->string('employee_parmanent_address');
            $table->string('employee_present_address');
            $table->string('employee_photo');
            $table->integer('employee_status');
            $table->string('shift_id');
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
        Schema::dropIfExists('tbl_employee');
    }
}
