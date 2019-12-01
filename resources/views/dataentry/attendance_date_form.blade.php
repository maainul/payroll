@extends('data_layout')
@section('data_content')
<?php
use Carbon\Carbon;
?>
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
            <h4 class="page-title">Take Attendance</h4>
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
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{URL::to('/attendance-form')}}" method="post">
                {{csrf_field()}}
                <div class="card-body">
                    <h4 class="card-title">Take Today Attendance</h4>
                @if (Session::has('message'))
                   <div class="alert alert-success" role="alert">
                       {{Session::get('message')}}
                   </div>
                @elseif (Session::has('error'))
                   <div class="alert alert-warning" role="alert">
                       {{Session::get('error')}}
                   </div>
                @endif
                <h2 class="text-center" style="color: #2d5596"> Today: {{Carbon::today()->format('l,d F-Y')}}</h2>
                      <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Date</label>
                        <div class="col-sm-9">
                            <input type="text" name="attendance_date" class="form-control" id="fname" required="" value="{{Carbon::today()->format('Y-m-d')}}" readonly>
                        </div>
                    </div>
                     <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Unit</label>
                    <div class="col-sm-9">
                        <select name="unit_id" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <?php 
                            $all_unit=DB::table('tbl_unit')
                                            ->join('tbl_office','tbl_unit.office_id','=','tbl_office.office_id')
                                            ->get();
                            ?>
                            @foreach($all_unit as $v_all_unit)
                            <option value="{{$v_all_unit->unit_id}}">{{$v_all_unit->office_name}}-{{$v_all_unit->unit_name}}</option>
                          @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Shift</label>
                        <div class="col-sm-9">
                            <select name="shift_id" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <option value="day">Day Shift</option>
                            <option value="night">Evening Shift</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Employee List</button>
                    </div>
                </div>
            </form>
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