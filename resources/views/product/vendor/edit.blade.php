@extends('layouts.master')

@section('title', 'Update Vendor')

@section('css')
@endsection

@section('breadcrumb')
<h3 class="page-title">Home > Product > Update Vendor</h1>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Edit Product Category</h4>
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

                            <form method="post" action="{{ url('product_vendor/update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $vendor->id }}" />
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $vendor->name }}" class="form-control" placeholder="Type something"/>
                                </div>
                                <div class="form-group">
                                    <label>Contact Information</label>
                                    <input type="text" name="contact" value="{{ $vendor->contact_info }}" class="form-control" placeholder="Type something"/>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{ $vendor->address }}" class="form-control" placeholder="Type something"/>
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

