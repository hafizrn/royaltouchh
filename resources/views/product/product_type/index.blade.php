@extends('layouts.master')

@section('title', 'Product Type')

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Home > Product Type</h1>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <a class="btn btn-primary pull-right" href="{{ url('product_type/add') }}">Add Type</a>
                            <br/><h4 class="mt-0 header-title">Products Type</h4>
                            
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Product Category</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productTypes as $type)
                                    <tr>
                                        <th scope="row">{{ $type->id}}</th>
                                        <td>{{$type->name}}</td>
                                        <td>{{$type->product_category_id}}</td>
                                        <td><a class="btn btn-danger btn-sm" href="/product_type/delete/{{$type->id}}">Delete</a> <a href="/product_type/edit/{{$type->id}}" class="btn btn-primary btn-sm">Edit</a></td>
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

