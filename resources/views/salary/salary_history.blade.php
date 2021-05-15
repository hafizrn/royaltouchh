@extends('layouts.master')

@section('title', 'Employee Salary History')

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Home > Salary history</h1>
@endsection

@section('content')
                <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <br/><h4 class="mt-0 header-title">Salary History</h4>
                                            
                                            @if ($message = Session::get('success'))
                                                <div class="alert alert-success">
                                                    <p>{{ $message }}</p>
                                                </div>
                                            @endif
                                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Employee</th>
                                                    <th>Salary Month</th>
                                                    <th>Salary Amount</th>
                                                    <th>Salary Paid</th>
                                                    <th>Salary Due</th>
                                                    <th>Salary Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($salaries as $salary)
                                                    <tr>
                                                        <th scope="row">{{ $salary->id}}</th>
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
                                </div>
                            </div>
                        </div><!-- container -->
                    </div> <!-- Page content Wrapper -->

@endsection

@section('script')
<!-- Datatable js -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
@endsection

@section('script-bottom')
<script type="text/javascript">
    $(document).ready(function () {
          $('#datatable').DataTable();
    });
</script>

@endsection
