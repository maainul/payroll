<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ManagerController extends Controller
{
//------------------------------------------MAnager See Employee List--------------------------------
    public function memployee_list()
    {
        $this->AdminAuthCheck();
        $all_employee= DB::table('tbl_employee')
								->join('tbl_grade','tbl_employee.grade_id','=','tbl_grade.grade_id')
                                ->get();
        return view('manager.employee_list',compact('all_employee'));
    }
//-------------------------------------Show Leave Form to Manager-------------------------------------    
    public function show_leave_form($employee_id)
	{
	    $this->AdminAuthCheck(); 
	    $employee_detail=DB::table('tbl_employee')
	                ->where('employee_id',$employee_id)
	                ->first();
	    $leave_number=DB::table('tbl_leave')
	                ->whereMonth('leave_date',Carbon::now()->month)
	                ->where('employee_id',$employee_id)
	                ->count('employee_id');
	     $leave_detail=DB::table('tbl_leave')
	                ->whereMonth('leave_date',Carbon::now()->month)
	                ->where('employee_id',$employee_id)
	                ->get();         
	    return view('manager.leave_form',compact('employee_detail','leave_number','leave_detail'));
	}
//-------------------------------------Save Leave-------------------------------------
	public function add_employee_leave(Request $request)
	    {
	        $this->AdminAuthCheck(); 
	        $employee=$request->employee_id;
	        $date_check=DB::table('tbl_leave')
	                ->whereDate('leave_date',Carbon::today())
	                ->where('employee_id',$employee)
	                ->first();
	        if($date_check)
	        {
	            Session::put('message','Employee Leave already Added');
	            return redirect::back();
	        }else{
	            $data=array();
	        $data['employee_id']=$request->employee_id;
	        $data['leave_date']=$request->leave_date;
	        $data['leave_purpose']=$request->leave_purpose;
	        $add_leave=DB::table('tbl_leave')->insert($data);
	        if($add_leave)
	        {
	            Session::put('message','Employee Leave added successfully');
	            return redirect::back();
	        }
	        }
    }

 //----------------------------------- Employee Detail information---------------------------------
    public function manager_employee_detail($employee_id)
    {
        $employee_Detail=DB::table('tbl_employee')
                ->join('tbl_designation','tbl_employee.designation_id','=','tbl_designation.designation_id')
                ->join('tbl_department','tbl_designation.department_id','=','tbl_department.department_id')
                ->join('tbl_unit','tbl_employee.unit_id','=','tbl_unit.unit_id')
                ->join('tbl_office','tbl_unit.office_id','=','tbl_office.office_id')
                ->join('tbl_grade','tbl_employee.grade_id','=','tbl_grade.grade_id')
                ->where('employee_id',$employee_id)
                ->first();
        $employee_leave=DB::table('tbl_leave')
                    ->where('employee_id',$employee_id)
                    ->whereMonth('leave_date',Carbon::now()->month)
                    ->count();
        return view('manager.employee_detail', compact('employee_Detail','employee_leave'));            
    }
 //----------------------------------- Attendance information---------------------------------
    public function manager_show_attendance_form()
    {
    	return view('manager.show_attendance_date_form');
    }
//----------------------------------- Generate Spacefic date information---------------------------------
    public function generate_date_attendance(Request $request)
    {
    	$unit_id=$request->unit_id;
    	$a_date=date('Y-m-d', strtotime(str_replace('-', '/', $request->attendance_date)));
    	$attendance=DB::table('tbl_attendance')
    			->join('tbl_employee','tbl_attendance.employee_id','=','tbl_employee.employee_id')
    			->join('tbl_unit','tbl_attendance.unit_id','=','tbl_unit.unit_id')
                ->join('tbl_designation','tbl_employee.designation_id','=','tbl_designation.designation_id')
    			->where('attendance_date',$a_date)
    			->where('tbl_attendance.unit_id',$unit_id)
    			->get();
    		/*dd($a_date);*/
    	return view('manager.show_update_attendance_form', compact('attendance','a_date'));
    }
//----------------------------------- Manager Update Attendance---------------------------------
  public function manager_update_attendance(Request $request)
    {
    $a_date=date('Y-m-d', strtotime(str_replace('-', '/', $request->attendance_date)));
        foreach ($request->id as $id) {

            $data=array();
            $data['in_time']=$request->att_in[$id];
            $data['out_time']=$request->att_out[$id];
            $data['attendance_status']=$request->attendance[$id];
              
            $attendances=DB::table('tbl_attendance')
                            ->whereDate('attendance_date',$a_date)
                            ->where('id',$id)
                            ->update($data);
            }
             $msg = ['message' => 'Attendance Updated Successfully!',];
               return Redirect :: to('/manager-change-attendance')->with($msg);
    }

//-----------------MAnager Authencation-------------------------------
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
