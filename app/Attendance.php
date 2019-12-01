<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model

{
	protected $table='tbl_attendance';
    protected $fillable = [
        'employee_id', 'unit_id', 'shift_id','attendance_date', 'in_time', 'out_time','attendance_status',
    ];
}
