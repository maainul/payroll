<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_attendance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->integer('unit_id');
            $table->string('shift_id');
            $table->date('attendance_date');
            $table->time('in_time');
            $table->time('out_time');
            $table->string('attendance_status');
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
        Schema::dropIfExists('tbl_attendance');
    }
}
