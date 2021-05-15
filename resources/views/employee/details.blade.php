@extends('layouts.master')

@section('title', 'Employee Details')

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
 <!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Tables</h1>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">
                                        <h4 class="pull-right font-16"><strong>ID : {{$employee->userid}}</strong></h4>
                                        <h3 class="m-t-0">
                                            <img src="{{ URL::asset('assets/images/logo.png') }}" alt="logo" height="26"/>
                                        </h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <address>
                                                <strong>{{$employee->name}}</strong><br>
                                                Email : {{$employee->email}}<br>
                                                Designation : {{$employee->designation}}<br>
                                                Present Salary : {{$employee->salary}}
                                            </address>
                                        </div>
                                        <div class="col-6 text-right">
                                            <address>
                                                Remarks : {{$employee->remarks}}
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 class=""><strong>Salary History</strong></h4>
                            </div>
                            <hr>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Month</th>
                                        <th>Salary Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Due Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($salaries as $salary)
                                    <tr>
                                        <td scope="row">{{ $salary->employee->name}}</td>

                                        <?php $monthNum = $salary->salary_month;
                                        $dateObj = DateTime::createFromFormat('!m', $monthNum);
                                        $monthName = $dateObj->format('F');?>
                                            
                                        <td scope="row">{{ $monthName}},{{ $salary->salary_year}}</td>
                                        <td scope="row">{{ $salary->salary_amount}}</td>
                                        <td scope="row">{{ $salary->paid_amount}}</td>
                                        <td scope="row">
                                            @if ($salary->due_amount == 0)
                                            No due
                                            @elseif ($salary->due_amount < 0)
                                            {{$salary->due_amount }} (Overpaid)
                                            @else
                                            {{ $salary->due_amount }}
                                            @endif
                                        </td>
                                        <td scope="row">{{ $salary->salary_date}}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div><!-- container -->
    </div> <!-- Page content Wrapper -->

@endsection

@section('script')
<!-- Required datatable js -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('assets/pages/datatables.init.js') }}"></script>
@endsection

