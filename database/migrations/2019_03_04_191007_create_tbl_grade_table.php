<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_grade', function (Blueprint $table) {
            $table->increments('grade_id');
            $table->string('grade_name');
            $table->string('total_salary');
            $table->string('basic_salary');
            $table->string('home_rent');
            $table->string('medical_allowance');
            $table->string('transport_allowance');
            $table->string('lunch_allowance');
            $table->integer('festible_bonus');
            $table->string('ot_rate');
            $table->string('holiday_bonus');
            $table->string('holiday');
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
        Schema::dropIfExists('tbl_grade');
    }
}
