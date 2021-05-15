@extends('layouts.master')

@section('title', 'Add New Employee')

@section('css')
@endsection

@section('breadcrumb')
<h3 class="page-title">Home > Employee Add</h1>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Insert Employee info</h4>
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

                            <form method="post" action="{{ url('employee/store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Type something"/>
                                </div>

                                <div class="form-group">
                                    <label>Employee ID</label>
                                    <input type="text" name="userid" class="form-control" placeholder="Type something"/>
                                </div>

                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <div>
                                        <input type="email" name="email" class="form-control"
                                                parsley-type="email" placeholder="Enter a valid e-mail"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Designation</label>
                                    <div>
                                        <input type="text" name="designation" class="form-control" placeholder="Type something"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Salary</label>
                                    <div>
                                        <input data-parsley-type="digits" type="number" name="salary"
                                                class="form-control"
                                                placeholder="Enter only digits"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Photo</label>
                                    <div>
                                        <input type="file" name="photo" class="form-control" placeholder="Type something"/>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <div>
                                        <textarea name="remarks" class="form-control" rows="5"></textarea>
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
<!-- Parsley js -->
<!-- <script type="text/javascript" src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script> -->
@endsection

@section('script-bottom')
<!-- <script type="text/javascript">
     $(document).ready(function() {
            $('form').parsley();
    });
</script> -->
@endsection

