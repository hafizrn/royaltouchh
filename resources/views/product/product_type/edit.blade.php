@extends('layouts.master')

@section('title', 'Update Product Type')

@section('css')
@endsection

@section('breadcrumb')
<h3 class="page-title">Home > Product Type Update</h1>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Edit Product Type</h4>
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

                            <form method="post" action="{{ url('product_type/update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $type->id }}" />
                                <div class="form-group">
                                    <label class="control-label">Product Category ID</label>
                                    <select class="form-control select2" name="product_category_id">
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

