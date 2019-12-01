<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class EmployeeController extends Controller
{
    //create form
   public function employee_form()
   {
   		return view('hrm.add_employee_form');
   }
//store add employee list
   public function add_employee(Request $request)
    {
    	$data=array();
    		$data['unit_id']=$request->unit_id;
    		$data['designation_id']=$request->designation_id;
    		$data['grade_id']=$request->grade_id;
            $data['employee_name']=$request->employee_name;
    		$data['employee_phone']=$request->employee_phone;
    		$data['employee_email']=$request->employee_email;
    		$data['employee_date_of_birth']=$request->employee_date_of_birth;
    		$data['employee_join_date']=$request->employee_join_date;
    		$data['employee_nid']=$request->employee_nid;
    		$data['employee_father_name']=$request->employee_father_name;
    		$data['employee_mother_name']=$request->employee_mother_name;
    		$data['employee_parmanent_address']=$request->employee_parmanent_address;
    		$data['employee_present_address']=$request->employee_present_address;
    		$data['employee_status']='1';
    		$data['shift_name']=$request->shift_id;
    		$image=$request->file('employee_photo');
    		if ($image) {
    			$image_name=str_random(20);
    			$ext=strtolower($image->getClientOriginalExtension());
    			$image_full_name=$image_name. '.' .$ext;
    			$upload_path='employee/';
    			$image_url=$upload_path.$image_full_name;
    			$success=$image->move($upload_path,$image_full_name);
    		if($success){
    			$data['employee_photo']=$image_url;
    				DB::table('tbl_employee')->insert($data);
    				Session::put('message','Employee added successfully');
    					return redirect::back();	
    		}
    		}
    		$data['employee_photo']='';
    		DB::table('tbl_employee')->insert($data);
    				Session::put('message','Employee added successfully without image');
    				return redirect::back();	
    }
//--------------------------- employee list ----------------------------------------------
    public function employee_list()
    {
        $this->AdminAuthCheck();
        $all_employee= DB::table('tbl_employee')
								->join('tbl_grade','tbl_employee.grade_id','=','tbl_grade.grade_id')
                                ->get();
        return view('hrm.all_employee_list',compact('all_employee'));
    }
    
//----------------------------HR Manager Authencaion Check-------------------------------
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
