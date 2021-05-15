@extends('layouts.master')
@section('title', 'Products')

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Home > Products</h1>
@endsection

@section('content')
                <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <a class="btn btn-primary pull-right" href="{{ url('product/add') }}">Add New Product</a>
                                            <br/><h4 class="mt-0 header-title">Products</h4>
                                            
                                            @if ($message = Session::get('success'))
                                                <div class="alert alert-success">
                                                    <p>{{ $message }}</p>
                                                </div>
                                            @endif
                                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>Code</th>
                                                    <th>Stock</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $product)
                                                    <tr>
                                                        <td class="product-list-img">
                                                            <img src="{{ URL::asset('img/'.$product->image) }}" class="img-fluid" alt="Image">
                                                        </td>
                                                        <td>
                                                            <h6 class="mt-0 m-b-5"><a href="/product/code/{{$product->code}}">{{$product->name_english}}</a></h6>
                                                            <p class="m-0 font-14">{{$product->name_bangla}}</p>
                                                        </td>
                                                        
                                                        <th scope="row">{{ $product->code}}</th>
                                                        <td scope="row">{{ $product->stock}}</td>
                                                        <td>
                                                            <a class="text-muted" href="/product/edit/{{$product->code}}">Edit <i class="mdi mdi-pencil font-18"></i></a>
                                                        </td>
                                                        
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

