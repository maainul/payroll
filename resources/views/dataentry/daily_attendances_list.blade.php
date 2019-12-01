@extends('data_layout')
@section('data_content')
<?php use Carbon\Carbon; ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Today  Attendance List</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">All Attendance Information </h5>
@if (Session::has('message'))
   <div class="alert alert-success" role="alert">
       {{Session::get('message')}}
   </div>
@elseif (Session::has('error'))
   <div class="alert alert-warning" role="alert">
       {{Session::get('error')}}
   </div>
@endif
 <h2 class="text-center" style="color: #2d5596"> Attendance List for: {{Carbon::today()->format('l,F-d,Y')}}</h2>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Ofice</th>
                            <th>Unit</th>
                            <th>Shift</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daily_attendance as $v_daily_attnd)
                        <tr>
							<td>{{$v_daily_attnd->per_office}}</td>
                            <td>{{$v_daily_attnd->per_unit}}</td>
                            <td>{{$v_daily_attnd->per_shift}}</td>
                            <td>
                            	<a href="{{URL::to('/attendance-detail/'.$v_daily_attnd->per_unit.'/'.$v_daily_attnd->per_shift)}}"><button type="button" class="btn btn-outline-primary">Update</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                           <th>Unit</th>
                            <th>Ofice</th>
                            <th>Shift</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>

<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>

@endsection