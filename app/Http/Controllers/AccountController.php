<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use PDF;
class AccountController extends Controller
{
 //--------------------------- employee list ----------------------------------------------
    public function aemployee_list()
    {
        $this->AdminAuthCheck();
        $all_employee= DB::table('tbl_employee')
								->join('tbl_grade','tbl_employee.grade_id','=','tbl_grade.grade_id')
                                ->get();
        return view('accountant.all_employee_list',compact('all_employee'));
    }
//------------------------------Employee Wise Salary-----------------------------------------------
	public function employee_salary_detail($employee_id)
    {
        $this->AdminAuthCheck(); 
    	$employee_salary=DB::table('tbl_employee')
         		->join('tbl_designation','tbl_employee.designation_id','=','tbl_designation.designation_id')
                ->join('tbl_department','tbl_designation.department_id','=','tbl_department.department_id')
                ->join('tbl_unit','tbl_employee.unit_id','=','tbl_unit.unit_id')
                ->join('tbl_office','tbl_unit.office_id','=','tbl_office.office_id')
                ->join('tbl_grade','tbl_employee.grade_id','=','tbl_grade.grade_id')
         		->where('employee_id',$employee_id)
         		->first();

            $numberOfHours = DB::table('tbl_attendance')
                    ->where('employee_id', $employee_id)
                    ->where('attendance_status', 'present')
                    ->whereMonth('attendance_date',Carbon::now()->month)
                    ->whereNotNull('in_time')
                    ->whereNotNull('out_time')
                    ->select(DB::raw('SUM(time_to_sec(timediff(out_time, in_time)) / 3600) as result '))
                    ->get();
                
                    
         	$employee_att=DB::table('tbl_attendance')
         				->where('employee_id',$employee_id)
         				->whereMonth('attendance_date',Carbon::now()->month)
                        ->where('attendance_status','present')
         				->get();
         	$employee_abs=DB::table('tbl_attendance')
         				->where('employee_id',$employee_id)
         				->whereMonth('attendance_date',Carbon::now()->month)
         				->where('attendance_status','absent')
         				->count();
            $shift_night=DB::table('tbl_attendance')
                        ->where('employee_id',$employee_id)
                        ->whereMonth('attendance_date',Carbon::now()->month)
                        ->where('shift_id','night')
                        ->count();
            $leave_number=DB::table('tbl_leave')
                        ->whereMonth('leave_date',Carbon::now()->month)
                        ->where('employee_id',$employee_id)
                        ->count('employee_id');
            $festible=DB::table('tbl_festible')
                       ->whereMonth('festible_date',Carbon::now()->month)
                       ->first();
            $join_date=DB::table('tbl_employee')
                        ->where('employee_id',$employee_id)
                        ->whereBetween('employee_join_date', ['employee_join_date', Carbon::today()])->count();
             $salary_check=DB::table('tbl_salary')
                    ->whereMonth('created_at',Carbon::now()->month)
                    ->where('employee_id',$employee_id)
                    ->count();

    return view('accountant.employee_salary_detail', compact('employee_salary','employee_abs','employee_att','shift_night','leave_number','numberOfHours','join_date','festible','salary_check'));
    }
//-----------------------------------Pay Employee Salary---------------------------------
    public function pay_salary(Request $request)
    {
        $this->AdminAuthCheck();
        $employee=$request->employee_id;
            $date_check=DB::table('tbl_salary')
                    ->whereMonth('created_at',Carbon::now()->month)
                    ->where('employee_id',$employee)
                    ->first();
            if($date_check)
            {
                $msg = ['error' => 'Employee Salary Already Paid',];
                return redirect::back()->with($msg);
            }else{
        $data=array();
            $data['employee_id']=$request->employee_id;
            $data['unit_id']=$request->unit_id;
            $data['office_id']=$request->office_id;
            $data['grade_id']=$request->grade_id;
            $data['designation_id']=$request->designation_id;
            $data['department_id']=$request->department_id;
            $data['bonus']=$request->bonus;
            $data['fine']=$request->fine;
            $data['total_salary']=$request->total_salary;
            $data['created_at']=Carbon::now();
            $insert=DB::table('tbl_salary')->insert($data);
            if($insert)
            {
                $msg = ['message' => 'Employee Salary Paid Successfully',];
                return redirect::back()->with($msg);
            }
        }
    }
//----------------------------------- Employee Detail information---------------------------------
    public function employee_detail($employee_id)
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
        return view('accountant.employee_detail', compact('employee_Detail','employee_leave'));            
    }
//-------------------------------------------------Load PDF-------------------------------
public function show_employee_salary_pdf($employee_id)
    {
        $this->AdminAuthCheck(); 
        $employee_salary=DB::table('tbl_employee')
                ->join('tbl_designation','tbl_employee.designation_id','=','tbl_designation.designation_id')
                ->join('tbl_department','tbl_designation.department_id','=','tbl_department.department_id')
                ->join('tbl_unit','tbl_employee.unit_id','=','tbl_unit.unit_id')
                ->join('tbl_office','tbl_unit.office_id','=','tbl_office.office_id')
                ->join('tbl_grade','tbl_employee.grade_id','=','tbl_grade.grade_id')
                ->where('employee_id',$employee_id)
                ->first();

            $numberOfHours = DB::table('tbl_attendance')
                    ->where('employee_id', $employee_id)
                    ->where('attendance_status', 'present')
                    ->whereMonth('attendance_date',Carbon::now()->month)
                    ->whereNotNull('in_time')
                    ->whereNotNull('out_time')
                    ->select(DB::raw('SUM(time_to_sec(timediff(out_time, in_time)) / 3600) as result '))
                    ->get();
                
                    
            $employee_att=DB::table('tbl_attendance')
                        ->where('employee_id',$employee_id)
                        ->whereMonth('attendance_date',Carbon::now()->month)
                        ->where('attendance_status','present')
                        ->get();
            $employee_abs=DB::table('tbl_attendance')
                        ->where('employee_id',$employee_id)
                        ->whereMonth('attendance_date',Carbon::now()->month)
                        ->where('attendance_status','absent')
                        ->count();
            $shift_night=DB::table('tbl_attendance')
                        ->where('employee_id',$employee_id)
                        ->whereMonth('attendance_date',Carbon::now()->month)
                        ->where('shift_id','night')
                        ->count();
            $leave_number=DB::table('tbl_leave')
                        ->whereMonth('leave_date',Carbon::now()->month)
                        ->where('employee_id',$employee_id)
                        ->count('employee_id');
            $festible=DB::table('tbl_festible')
                       ->whereMonth('festible_date',Carbon::now()->month)
                       ->first();
            $join_date=DB::table('tbl_employee')
                        ->where('employee_id',$employee_id)
                        ->whereBetween('employee_join_date', ['employee_join_date', Carbon::today()])->count();
             $salary_check=DB::table('tbl_salary')
                    ->whereMonth('created_at',Carbon::now()->month)
                    ->where('employee_id',$employee_id)
                    ->count();

    $pdf=PDF::loadView ('accountant.pdf_employee_salary', compact('employee_salary','employee_abs','employee_att','shift_night','leave_number','numberOfHours','join_date','festible','salary_check'));
     return $pdf->stream();
    }
//unit list for salary it will show all unit list 
    //
    public function all_unit_list_for_salary()
    {
        $this->AdminAuthCheck(); 
        $all_unit=DB::table('tbl_unit')
                        ->join('tbl_office','tbl_unit.office_id','=','tbl_office.office_id')
                        ->get();
        return view('accountant.all_unit_for_salary', compact('all_unit'));
    }
//employee list it will show all employee list for particular unit
    public function unit_employee_list($unit_id)
    {
        $this->AdminAuthCheck(); 
        $all_employee=DB::table('tbl_employee')
                        ->join('tbl_designation','tbl_employee.designation_id','=','tbl_designation.designation_id')
                        ->join('tbl_grade','tbl_employee.grade_id','=','tbl_grade.grade_id')
                        ->where('unit_id',$unit_id)
                        ->get();
        return view('accountant.all_unit_employee_list',compact('all_employee'));
    }

    public function generate_pdf_salary($unit_id)
    {
        $this->AdminAuthCheck(); 
        $employee_salary=DB::table('tbl_employee')
                ->join('tbl_designation','tbl_employee.designation_id','=','tbl_designation.designation_id')
                ->join('tbl_department','tbl_designation.department_id','=','tbl_department.department_id')
                ->join('tbl_grade','tbl_employee.grade_id','=','tbl_grade.grade_id')
                ->where('unit_id',$unit_id)
                ->get();
        $office=DB::table('tbl_unit')
                ->join('tbl_office','tbl_unit.office_id','=','tbl_unit.office_id')
                ->where('unit_id',$unit_id)
                ->first();
        $pdf=PDF::loadView('accountant.generate_unit_salary',compact('employee_salary','office'));
        return $pdf->stream();
    }
//----------------------------show salary form-------------------------------
public function show_salary_form()
{
    return view('accountant.show_salary_form');
}
//----------------------------show salary data-------------------------------
public function search_salary_record(Request $request)
{
     $month=$request->salary_month;
     $year=$request->salary_year;
     $unit=$request->unit_id;
    
     $total_salary=DB::table('tbl_salary')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->where('unit_id', $unit)
                ->get();
    if($total_salary){
        return view('accountant.unit_wise_salary',compact('total_salary'));
    }else{
        $msg = ['message' => 'No Data Found',];
                return redirect::back()->with($msg);
    }
}
//----------------------------Accountant Authencaion Check-------------------------------
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
