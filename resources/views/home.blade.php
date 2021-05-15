@extends('layouts.master')

@section('css')
<!-- C3 charts css -->
<link href="{{ URL::asset('assets/plugins/c3/c3.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Admin Area</h1>
@endsection

@section('content')
<div class="page-content-wrapper">
<div class="container-fluid">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="mini-stat clearfix bg-white">
                <span class="mini-stat-icon bg-purple mr-0 float-right"><i class="mdi mdi-basket"></i></span>
                <div class="mini-stat-info">
                    <span class="counter text-purple">25140</span>
                    Total Sales
                </div>
                <div class="clearfix"></div>
                <p class=" mb-0 m-t-20 text-muted">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="mini-stat clearfix bg-white">
                <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i class="mdi mdi-black-mesa"></i></span>
                <div class="mini-stat-info">
                    <span class="counter text-blue-grey">65241</span>
                    New Orders
                </div>
                <div class="clearfix"></div>
                <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="mini-stat clearfix bg-white">
                <span class="mini-stat-icon bg-brown mr-0 float-right"><i class="mdi mdi-buffer"></i></span>
                <div class="mini-stat-info">
                    <span class="counter text-brown">85412</span>
                    New Users
                </div>
                <div class="clearfix"></div>
                <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="mini-stat clearfix bg-white">
                <span class="mini-stat-icon bg-teal mr-0 float-right"><i class="mdi mdi-coffee"></i></span>
                <div class="mini-stat-info">
                    <span class="counter text-teal">20544</span>
                    Unique Visitors
                </div>
                <div class="clearfix"></div>
                <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
            </div>
        </div>
    </div>

    
    <!-- end row -->

</div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection

@section('script')
<script src="{{ URL::asset('assets/plugins/peity-chart/jquery.peity.min.js') }}"></script>
<!--C3 Chart-->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/d3/d3.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/c3/c3.min.js') }}"></script>
<!-- KNOB JS -->
<script src="{{ URL::asset('assets/plugins/jquery-knob/excanvas.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
<!-- Page specific js -->
<script src="{{ URL::asset('assets/pages/dashboard.js') }}"></script>
@endsection

