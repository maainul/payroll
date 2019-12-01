@extends('hrm_layout')
@section('hrm_content')
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
            <h4 class="page-title">Update Unit</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Office</li>
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
    <div class="col-md-6">
    <div class="card">
        <form class="form-horizontal" action="{{URL::to('/update-unit')}}" method="post">
            {{csrf_field()}}
            <div class="card-body">
                <h4 class="card-title">Unit Info</h4>
                  <?php
                $message=Session::get('message');
                
                if($message)
                {
                    echo $message;
                    Session::put('message',NULL);
                }
                ?>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Unit Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="unit_name" class="form-control" id="fname" value="{{$all_unit->unit_name}}">
                        <input type="hidden" name="unit_id" value="{{$all_unit->unit_id}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Office</label>
                    <div class="col-sm-9">
                        <select name="office_id" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <option value="{{$all_unit->office_id}}">{{$all_unit->office_name}}</option>
                            <?php
                        $all_office=DB::table('tbl_office')
                        ->get();
                        ?>
                            @foreach($all_office as $v_show_office)
                            <option value="{{$v_show_office->office_id}}">{{$v_show_office->office_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Update Unit</button>
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