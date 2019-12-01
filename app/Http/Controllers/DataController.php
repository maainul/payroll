<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class DataController extends Controller
{
    // Form for attendance
    public function attendence_date_form()
    {
    	 $this->AdminAuthCheck();
    	return view('dataentry.attendance_date_form');
    }
    //attendance form
    public function attendence_form(Request $request)
    {
    	 $this->AdminAuthCheck();
    	 $attend_date=$request->input('attendance_date');
    	  $unit=$request->input('unit_id');
    	  $shift=$request->input('shift_id');
    	
        $att_date=DB::table('tbl_attendance')
                ->where('attendance_date',$attend_date)
                ->where('unit_id',$unit)
                ->where('shift_id',$shift)
                ->first();
        if($att_date){
            $msg = ['error' => 'Attendance Already Taken!',];
            return Redirect::to('/attendance-date')->with($msg);
        }else{
    	  $attendance_employee= DB::table('tbl_employee')
    	  						->join('tbl_designation','tbl_employee.designation_id','=','tbl_designation.designation_id')
                                ->where('shift_name',$shift)
                                ->where('employee_status','1')
                                ->where('unit_id',$unit)
                                ->get();
             if ($attendance_employee) {
                $manage_attendence_employee=view('dataentry.attendance_form')
                 ->with('attendance_employee',$attendance_employee)
                 ->with('attend_date',$attend_date)
                 ->with('unit',$unit)
                 ->with('shift',$shift);
                    return view('data_layout')
                        ->with('dataentry.attendance_form',$manage_attendence_employee);
            }else{
                return view('dataentry.error');
            }
        }
    }
// add attendance data to the database
    public function take_attendance(Request $request)
    {
         $this->AdminAuthCheck();
         $date=$request->attend_date;
         $shift_id=$request->shift;
         $unit_id=$request->unit;
         $att_date=DB::table('tbl_attendance')
                ->where('attendance_date',$date)
                ->where('unit_id',$unit_id)
                ->where('shift_id',$shift_id)
                ->first();
        if($att_date){
            $msg = ['error' => 'Attendance Already Taken!',];
            return Redirect::to('/attendance-date')->with($msg);
        }else{
            foreach ($request->employee_id as $employee_id) {
               $data[]=[
                    "employee_id"=>$employee_id,
                    "unit_id"=>$request->unit,
                    "shift_id"=>$request->shift,
                    "attendance_date"=>$request->attend_date,
                    "in_time"=>$request->att_in[$employee_id],
                    "out_time"=>$request->att_out[$employee_id],
                    "attendance_status"=>$request->attendance[$employee_id]
               ];
            }
            $attend=DB::table('tbl_attendance')->insert($data);
                if ($attend) {
                      $msg = ['message' => 'Attendance Taken Successfully!',];
                     return Redirect :: to('/today-attendance')->with($msg);
                }else{
                     return view('dataentry.error');
            }
        }
    }

    public function today_attendance_list()
    {
        $this->AdminAuthCheck();
        $daily_attendance= DB::table('tbl_attendance')
                                ->join('tbl_unit','tbl_attendance.unit_id','=','tbl_unit.unit_id')
                                ->join('tbl_office','tbl_unit.office_id','=','tbl_office.office_id')
                                ->where('attendance_date', Carbon::today())
                                ->groupBy(DB::raw('unit_name'),DB::raw('shift_id'),DB::raw('office_name'))
                                ->select(DB::raw('shift_id as per_shift'),DB::raw('unit_name as per_unit'),DB::raw('office_name as per_office'))
                                ->get();
        $manage_daily_attendance=view('dataentry.daily_attendances_list')
            ->with('daily_attendance',$daily_attendance);
        return view('data_layout')
            ->with('dataentry.daily_attendances_list',$manage_daily_attendance);
    }
    //attendance detail page
    public function today_attendance_detail($per_unit,$per_shift)
    {
        $this->AdminAuthCheck();
        $daily_attendance_details= DB::table('tbl_attendance')
                                ->join('tbl_employee','tbl_attendance.employee_id','=','tbl_employee.employee_id')
                                ->join('tbl_unit','tbl_attendance.unit_id','=','tbl_unit.unit_id')
                                ->join('tbl_designation','tbl_employee.designation_id','=','tbl_designation.designation_id')
                                ->where('attendance_date', Carbon::today())
                                ->where('unit_name',$per_unit)
                                ->where('shift_id',$per_shift)
                                ->get();

        $manage_daily_attendance_detail=view('dataentry.daily_attendance_detail')
            ->with('daily_attendance_details',$daily_attendance_details);
        return view('data_layout')
            ->with('dataentry.daily_attendance_detail',$manage_daily_attendance_detail);
    }

    public function update_today_attendance(Request $request)
    {
        foreach ($request->id as $id) {

            $data=array();
            $data['in_time']=$request->att_in[$id];
            $data['out_time']=$request->att_out[$id];
            $data['attendance_status']=$request->attendance[$id];
              
            $attendances=DB::table('tbl_attendance')
                            ->whereDate('attendance_date', Carbon::today())
                            ->where('id',$id)
                            ->update($data);
            }
             $msg = ['message' => 'Attendance Updated Successfully!',];
              return Redirect :: to('/today-attendance')->with($msg);
    }

//------------------- Data Operator Authincation Check-----------------------
    public function AdminAuthCheck()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }

}
