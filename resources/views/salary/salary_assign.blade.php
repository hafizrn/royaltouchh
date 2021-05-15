@extends('layouts.master')

@section('title', 'Salary Generate')

@section('css')
    <link href="{{ URL::asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumb')
    <h3 class="page-title">Home > Employee's Salary Assaign</h1>
    @endsection

    @section('content')
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Assign Salary</h4>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="post" action="{{ url('employee/salary_assign') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label>Salary for the Year</label>
                                        <input type="number" name="s_year" class="form-control"
                                            placeholder="Type something" />
                                    </div>
                                    <div class="form-group">
                                        <label>Salary for the Month</label>
                                        <select class="form-control select2" name="s_month">
                                            <option>Select</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Employee ID</label>
                                        <select class="form-control select2" name="employee" id="employee">
                                            <option>Select</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Salary Amount: </label>
                                        <input type="text" class="form-control" id="salary" name="salary" readonly>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Paid Amount</label>
                                        <div>
                                            <input data-parsley-type="digits" type="number" name="paid_salary" class="form-control"
                                                placeholder="Enter only digits" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Salary given Date</label>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" name="date" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-pink waves-effect waves-light m-r-5">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div> <!-- end col -->


                </div> <!-- end row -->
            </div><!-- container -->
        </div> <!-- Page content Wrapper -->
    @endsection

    @section('script')
        <!-- Plugins js -->
        <script src="{{ URL::asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>

        <!-- Plugins Init js -->
        <script src="{{ URL::asset('assets/pages/form-advanced.js') }}"></script>

    @endsection

    @section('script-bottom')

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ready(function() {
                $('#employee').on('change', function(e) {
                    var emp_id = e.target.value;
                    $.ajax({
                        url: "{{ route('employee.get') }}",
                        type: "GET",
                        data: {
                            emp_id: emp_id
                        },
                        success: function(data) {
                            $("#salary").val(data.salary);
                        }
                    })
                });
            });

        </script>

    @endsection
