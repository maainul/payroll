<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin_login');
    }
//=-------------------------------------Admin Login Check------------------------------
    public function dashboard(Request $request)
    {
        $type=$request->input('admin_type');
    	$admin_user=$request->admin_user;
    	$admin_password=md5($request->admin_password);
    	$result=DB::table('tbl_admin')
    			->where('admin_user',$admin_user)
    			->where('admin_password',$admin_password)
    			->first();

    			/*echo "<pre>";
    			print_r($result);
    			exit();*/
    			if($result){
                    if($result->admin_type=='admin'){
                    Session::put('admin_name',$result->admin_name);
                    Session::put('admin_id',$result->admin_id);
                    Session::put('admin_type',$result->admin_type);
                    return Redirect::to('/dashboard');
                    }elseif($result->admin_type=='hr-manager'){
                    Session::put('admin_name',$result->admin_name);
                    Session::put('admin_id',$result->admin_id);
                    Session::put('admin_type',$result->admin_type);
                    return Redirect::to('/hr-manager');
                }elseif($result->admin_type=='manager'){
                    Session::put('admin_name',$result->admin_name);
                    Session::put('admin_id',$result->admin_id);
                    Session::put('admin_type',$result->admin_type);
                    return Redirect::to('/manager');
                }elseif($result->admin_type=='accountant'){
                    Session::put('admin_name',$result->admin_name);
                    Session::put('admin_id',$result->admin_id);
                    Session::put('admin_type',$result->admin_type);
                    return Redirect::to('/accountant');
                }elseif($result->admin_type=='data-entry'){
                    Session::put('admin_name',$result->admin_name);
                    Session::put('admin_id',$result->admin_id);
                    Session::put('admin_type',$result->admin_type);
                    return Redirect::to('/data-entry');
                }
                }else {
                    Session::put('message','Email or Password Invalid');
                    return Redirect::to('/admin');

                }
    }
 
 //------------------------------Add Roller Form-----------------------   
    public function add_login_form()
    {
        return view('admin.add_login_form');
    }

//-----------------------------Add New Roller-------------------------
     public function add_roller(Request $request)
    {
        $user_name=$request->admin_user;
        $name=DB::table('tbl_admin')
            ->where('admin_user',$user_name)
            ->first();
        if($name){
             $msg = ['error' => 'User Name Already Exist!',];
            return Redirect::to('/add-login-form')->with($msg);
        }else{
        $data=array();
        $data['admin_name']=$request->admin_name;
        $data['admin_email']=$request->admin_email;
        $data['admin_phone']=$request->admin_phone;
        $data['admin_user']=$request->admin_user;
        $data['admin_password']=md5($request->admin_password);
        $data['admin_type']=$request->admin_type;
        $result=DB::table('tbl_admin')->insert($data);
        if($result){
        $msg = ['message' => 'New Employee Rolled Successfully',];
        return redirect::back()->with($msg);    
        }
        else{
            return view('admin.error');
        }
        }
    }
//-------------------show all roller---------------------
public function show_all_roller()
{
    $all_roller_list=DB::table('tbl_admin')
               ->get();
    return view('admin.all_roll_list',compact('all_roller_list'));
}
//--------------------Update roller form------------------
public function show_update_roller($admin_id)
{
    $roller=DB::table('tbl_admin')
        ->where('admin_id',$admin_id)
        ->first();
    return view('admin.update_roller_form', compact('roller'));
}
//-------------------update roller-----------------------------
public function update_roller(Request $request)
    {
        $id=$request->admin_id;
        $data=array();
        $data['admin_name']=$request->admin_name;
        $data['admin_email']=$request->admin_email;
        $data['admin_phone']=$request->admin_phone;
        $data['admin_user']=$request->admin_user;
        $data['admin_password']=md5($request->admin_password);

        DB::table('tbl_admin')->where('admin_id',$id)->update($data);
        $msg = ['message' => 'Roller Information Update Successfully',];
        return redirect::back()->with($msg);    
    }
//---------------------------Delete Roller-=------------------------=-
public function delete_roller($admin_id)
{
    DB::table('tbl_admin')
        ->where('admin_id',$admin_id)
        ->delete();
        $msg = ['message' => 'Roller Delete Successfully',];
        return redirect::back()->with($msg);
}
//------------------- Admin Authincation Check-----------------------
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
