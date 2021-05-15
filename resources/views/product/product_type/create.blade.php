@extends('layouts.master')

@section('title', 'Add Product Type')

@section('css')
<link href="{{ URL::asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />

@endsection

@section('breadcrumb')
<h3 class="page-title">Home > Add Product Type </h1>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Add Product Type</h4>
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

                            <form method="post" action="{{ url('product_type/store') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label">Product Category ID</label>
                                    <select class="form-control select2" name="category_id" id="product_category_id">
                                        <option>Select</option>
                                        @foreach ($category as $catId)
                                        <option value="{{ $catId->id }}">{{ $catId->name }}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Type Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Type something"/>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" placeholder="Type something"/>
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
<!-- <script type="text/javascript">
     $(document).ready(function() {
            $('form').parsley();
    });
</script> -->
@endsection

