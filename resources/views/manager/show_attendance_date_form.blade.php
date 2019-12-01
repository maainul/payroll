@extends('manager_layout')
@section('manager_content')
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
            <h4 class="page-title">Generate Attendance Record</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Attendance Record</li>
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
            <form class="form-horizontal" action="{{URL::to('/generate-date-attendance')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-body">
                      <?php
                    $message=Session::get('message');
                    
                    if($message)
                    {
                        echo $message;
                        Session::put('message',NULL);
                    }
                    ?>
                   
                    
                    <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Month</label>
                    <div class="col-sm-9">
                        <input type="date" name="attendance_date" class="form-control">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Office</label>
                    <div class="col-sm-9">
                        <select name="unit_id" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <option value="">Select Office</option>
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
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Generate Attendance</button>
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