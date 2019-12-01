<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HrmController extends Controller
{
    public function festible_form()
    {
    	return view('hrm.festible_form');
    }

//-------------------------------------Save Festible-------------------------------------
	public function add_festible(Request $request)
	    {
	        $this->AdminAuthCheck(); 
	        $date_check=DB::table('tbl_festible')
	                ->whereMonth('festible_date',Carbon::now()->month)
	                ->first();
	        if($date_check)
	        {
	           $msg = ['success' => 'Festible Alead Successfully For this Month!',];
	            return redirect::back()->with($msg);
	        }else{
	            $data=array();
	         $data['festible_date']=Carbon::now();
	        $data['festible']=$request->festible;
	        $add_festible=DB::table('tbl_festible')->insert($data);
	        if($add_festible)
	        {
	             $msg = ['success' => 'Festible Add Successfully For this Month!',];
	            return redirect::back()->with($msg);
	        }
	        }
    }
//--------------------------------------Employee List---------------------------------------------
     public function employee_list_for_hr()
    {
        $this->AdminAuthCheck();
        $all_employee= DB::table('tbl_employee')
								->join('tbl_grade','tbl_employee.grade_id','=','tbl_grade.grade_id')
                                ->get();
        return view('hrm.all_employee_list',compact('all_employee'));
    }

//--------------------------------------Hr-Manager Authencation--------------------------------------
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
