<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class OfficeController extends Controller
{
    //Office Unit List
    public function office_list()
    {
         $all_unit=DB::table('tbl_unit')
                ->join('tbl_office','tbl_unit.office_id','=','tbl_office.office_id')
                ->get();
    	return view('hrm.add_office_form',compact('all_unit'));
    }

    public function add_office(Request $request)
    {
    	$data=array();
    	$data['office_name']=$request->office_name;
    	$result=DB::table('tbl_office')->insert($data);
    	if($result){
    	Session::put('message','Office added successfully!');
    	return redirect::back();	
    	}
    	else{
    		return view('admin.error');
    	}
    }

    public function add_unit(Request $request)
    {
    	$data=array();
    	$data['office_id']=$request->office_id;
    	$data['unit_name']=$request->unit_name;
    	$result=DB::table('tbl_unit')->insert($data);
    	if($result){
    	Session::put('message','Unit added successfully!');
    	return redirect::back();	
    	}
    	else{
    		return view('hrm.error');
    	}
    }
//show update page form
    public function show_update_unit($unit_id)
    {
         $all_unit=DB::table('tbl_unit')
                ->join('tbl_office','tbl_unit.office_id','=','tbl_office.office_id')
                ->where('unit_id',$unit_id)
                ->first();
        return view('hrm.show_update_unit', compact('all_unit'));
    }
//update logic
    public function update_unit(Request $request)
    {
        $office_unit_id=$request->input('unit_id');
         $data=array();
        $data['unit_name']=$request->unit_name;
        $data['office_id']=$request->office_id;
        DB::table('tbl_unit')
            ->where('unit_id',$office_unit_id)
            ->update($data);

        Session::put('message','Unit Update successfully!');
        return Redirect::back();
    }
//delete unit logic
    public function delete_unit($unit_id)
    {
         DB::table('tbl_unit')
            ->where('unit_id',$unit_id)
            ->delete();
        Session::put('message','Unit Delete successfully');
        return Redirect::back();
    }
// designation form
    public function designation_form()
    {
    	return view('hrm.add_designation_form');
    }
//add department logic
     public function add_department(Request $request)
    {
    	$data=array();
    	$data['department_name']=$request->department_name;
    	$result=DB::table('tbl_department')->insert($data);
    	if($result){
    	Session::put('message','Department added successfully!');
    	return redirect::back();	
    	}
    	else{
    		return view('hrm.error');
    	}
    }
//add department and designation logic

     public function add_designation(Request $request)
    {
    	$data=array();
    	$data['department_id']=$request->department_id;
    	$data['designation_name']=$request->designation_name;
    	$result=DB::table('tbl_designation')->insert($data);
    	if($result){
    	Session::put('message','Designation added successfully!');
    	return redirect::back();	
    	}
    	else{
    		return view('hrm.error');
    	}
    }

     public function designation_list()
    {
        $this->AdminAuthCheck();
        $all_designation= DB::table('tbl_designation')
								->join('tbl_department','tbl_designation.department_id','=','tbl_department.department_id')
                                ->get();
        $manage_designation=view('hrm.all_designation_list')
            ->with('all_designation',$all_designation);
        return view('hrm_layout')
            ->with('hrm.all_designation_list',$manage_designation);
    }


     public function grade_form()
    {
    	return view('hrm.add_grade_form');
    }

     public function add_grade(Request $request)
    {
    	$data=array();
    	$data['grade_name']=$request->grade_name;
    	$data['total_salary']=$request->total_salary;
    	$data['basic_salary']=$request->basic_salary;
    	$data['home_rent']=$request->home_rent;
    	$data['medical_allowance']=$request->medical_allowance;
    	$data['transport_allowance']=$request->transport_allowance;
    	$data['lunch_allowance']=$request->lunch_allowance;
        $data['festible_bonus']=$request->festible_bonus;
        $data['ot_rate']=$request->ot_rate;
        $data['holiday_bonus']=$request->holiday_bonus;
    	$data['holiday']=$request->holiday;
    	$result=DB::table('tbl_grade')->insert($data);
    	if($result){
    	Session::put('message','Grade added successfully!');
    	return redirect::back();	
    	}
    	else{
    		return view('admin.error');
    	}
    }

     public function grade_list()
    {
        $this->AdminAuthCheck();
        $all_grade= DB::table('tbl_grade')
                                ->get();
        $manage_grade=view('hrm.all_grade_list')
            ->with('all_grade',$all_grade);
        return view('hrm_layout')
            ->with('hrm.all_grade_list',$manage_grade);
    }


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
