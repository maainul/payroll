<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*------------------------------Backend Routes----------------------------------------------*/

//Route::get('/dashboard',['uses'=>'AdminController@show_dashboard','as'=>'dashboard']);

//---------------------------Admin Login-------- ---------------------------------
Route::get('/admin','AdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/dashboard','SuperAdminController@index');
Route::get('/logout','SuperAdminController@logout');

Route::get('/account-setting','SuperAdminController@account_setting');
Route::post('/update-admin','SuperAdminController@update_admin');

// --------------------------------Add User  Login------------------------------------------------------
Route::get('/add-login-form','AdminController@add_login_form');
Route::post('/add-roller','AdminController@add_roller');
Route::get('/all-roller','AdminController@show_all_roller');
Route::get('/show-update-roller/{admin_id}','AdminController@show_update_roller');
Route::post('/update-roller','AdminController@update_roller');
Route::get('/delete-roller/{admin_id}','AdminController@delete_roller');

//--------------------------------------Login for Ruler----------------------------------------------------
Route::get('/hr-manager','SuperAdminController@hr_manager');
Route::get('/manager','SuperAdminController@manager');
Route::get('/data-entry','SuperAdminController@data_entry');
Route::get('/accountant','SuperAdminController@accountant');
/*----------------------------------------------------------------------------------------------------------
--------------------------------------All HR Manager Route -------------------------------------------------
---------------------------------------------------------------------------------------------------------*/
// --------------------------------All Office & Unit Route--------------------------------------------------
Route::get('/add-office-form','OfficeController@office_list');
Route::post('/add-office','OfficeController@add_office');
Route::post('/add-unit','OfficeController@add_unit');
Route::get('/show-update-office/{unit_id}','OfficeController@show_update_unit');
Route::post('/update-unit','OfficeController@update_unit');
Route::get('/delete-unit/{unit_id}','OfficeController@delete_unit');

// --------------------------------All Department & Designation Route--------------------------------------
Route::get('/designation-form','OfficeController@designation_form');
Route::post('/add-department','OfficeController@add_department');
Route::post('/add-designation','OfficeController@add_designation');
Route::get('/designation-list','OfficeController@designation_list');
// --------------------------------All Grades Route------------------------------------------------------
Route::get('/grade-form','OfficeController@grade_form');
Route::post('/add-grade','OfficeController@add_grade');
Route::get('/grade-list','OfficeController@grade_list');

// --------------------------------All Employee  Route------------------------------------------------------
Route::get('/add-employee-form','EmployeeController@employee_form');
Route::post('/add-employee','EmployeeController@add_employee');
Route::get('/employee-list-for-hrm','HrmController@employee_list_for_hr');
// --------------------------------All Festible  Route------------------------------------------------------
Route::get('/festible-form','HrmController@festible_form');
Route::post('/add-festible','HrmController@add_festible');

/*----------------------------------------------------------------------------------------------------------
-----------------------------------------All Manager Route -------------------------------------------------
-----------------------------------------------------------------------------------------------------------*/
// ------------------------------MAnager Controll Employee----------------------------------------------------
Route::get('/memployee-list','ManagerController@memployee_list');
Route::get('/manager-employee-detail/{employee_id}','ManagerController@manager_employee_detail');
Route::get('/manager-change-attendance','ManagerController@manager_show_attendance_form');
Route::post('/generate-date-attendance','ManagerController@generate_date_attendance');
Route::post('/manager-update-attendance','ManagerController@manager_update_attendance');
//----------------------------------All Leave Route--------------------------------------------------------
Route::get('/leave-form/{employee_id}','ManagerController@show_leave_form');
Route::post('/add-leave','ManagerController@add_employee_leave');

/*----------------------------------------------------------------------------------------------------------
-----------------------------------All Data Operator Route -------------------------------------------------
-----------------------------------------------------------------------------------------------------------*/
// --------------------------------All Attendence  Route------------------------------------------------------
Route::get('/attendance-date','DataController@attendence_date_form');
Route::post('/attendance-form','DataController@attendence_form');
Route::post('/take-attendance','DataController@take_attendance');
Route::get('/today-attendance','DataController@today_attendance_list');
Route::get('attendance-detail/{per_unit}/{per_shift}','DataController@today_attendance_detail');
Route::post('/update-attendance','DataController@update_today_attendance');

/*----------------------------------------------------------------------------------------------------------
-----------------------------------------All Accountant Route -------------------------------------------------
-----------------------------------------------------------------------------------------------------------*/
Route::get('/employee-list','AccountController@aemployee_list');
Route::get('/employee-detail/{employee_id}','AccountController@employee_detail');
// --------------------------------All Salary  Route------------------------------------------------------
Route::get('/emplolyee-salary/{employee_id}','AccountController@employee_salary_detail');
Route::post('/pay-salary','AccountController@pay_salary');
Route::get('/show-employee-salary-pdf/{employee_id}','AccountController@show_employee_salary_pdf');
//-------------------------------------------------unit wise salary-----------------------------------------
Route::get('/current-unit','AccountController@all_unit_list_for_salary');
Route::get('/unit-employee-list/{unit_id}','AccountController@unit_employee_list');
Route::get('/generate-salary/{unit_id}','AccountController@generate_pdf_salary');
//--------------------------------------------------view salary record----------------------------------------
Route::get('/generate-salary-form','AccountController@show_salary_form');
Route::post('/search-salary-record','AccountController@search_salary_record');




