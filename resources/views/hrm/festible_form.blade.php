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
            <h4 class="page-title">Festible Month Record</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/hrm-manager')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Festible Month</li>
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
            <form class="form-horizontal" action="{{URL::to('/add-festible')}}" method="post">
                {{csrf_field()}}
                <div class="card-body">
                    <h4 class="card-title">Add Festible Month</h4>
                      <?php
                    $message=Session::get('message');
                    
                    if($message)
                    {
                        echo $message;
                        Session::put('message',NULL);
                    }
                    ?>
                    <h3 style="text-align: center;">Current Month:{{Carbon::now()->format('F-Y')}}</h3>
                    <div class="col-sm-9">
                        <select name="festible" class="select2 form-control custom-select" style="width: 100%; height:36px;"> required="">
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Add Festible</button>
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