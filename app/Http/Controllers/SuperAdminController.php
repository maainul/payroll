<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SuperAdminController extends Controller
{
    public function index()
    {
    	$this->AdminAuthCheck();
    	return view('admin.dashboard');
    }

    public function account_setting()
    {   
         $this->AdminAuthCheck();  
    $admin_detail=DB::table('tbl_admin')
                ->where('admin_id','1')
                ->first();
     $manage_admin_detail=view('admin.admin_update')
            ->with('admin_detail',$admin_detail);
        return view('admin_layout')
            ->with('admin.admin_update',$manage_admin_detail);
    }

    public function update_admin(Request $request)
    {
         $data=array();
        $data['admin_name']=$request->admin_name;
        $data['admin_email']=$request->admin_email;
        $data['admin_phone']=$request->admin_phone;
        $data['admin_user']=$request->admin_user;
        $data['admin_password']=md5($request->admin_password);

        DB::table('tbl_admin')->where('admin_id','1')->update($data);

        Session::put('message','Admin Detail Information Updated Successfully!');
       return Redirect::back();
    }

    public function logout()
    {
      	Session::flush();
    	return Redirect::to('/admin');
    }

//-----------------------------HR MAnager------------------------
public function hr_manager()
{
    return view('hrm.dashboard');
}
//----------------------------- MAnager------------------------
public function manager()
{
    return view('manager.dashboard');
}
//----------------------------- Data Entry------------------------
public function data_entry()
{
    return view('dataentry.dashboard');
}
//----------------------------- Data Entry------------------------
public function accountant()
{
    return view('accountant.dashboard');
}
//-----------------------------Admin Authencation------------------------
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
