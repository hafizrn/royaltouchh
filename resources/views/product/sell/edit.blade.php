@extends('layouts.master')

@section('title', 'Product Sell Update')

@section('css')
@endsection

@section('breadcrumb')
<h3 class="page-title">Home > Product > Sell Update</h1>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Edit Product Purchase</h4>
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

                            <form method="post" action="{{ url('product_purchase/update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $purchase->id }}" />
                                <div class="form-group">
                                    <label class="control-label">Product Name</label>
                                    <select class="form-control select2" name="product_id">
                                        <option>Select</option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}" {{ $product->id == $purchase->product_id ? 'selected' : '' }}>{{ $product->name_english }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" value="{{ $purchase->quantity }}" class="form-control" placeholder="Type something"/>
                                </div>
                                <div class="form-group">
                                    <label>Unit Price</label>
                                    <input type="number" name="unit_price" value="{{ $purchase->unit_price }}" class="form-control" placeholder="Type something"/>
                                </div>
                                
                                <div class="form-group">
                                    <label>Purchase Date</label>
                                    <input type="date" name="date" value="{{ $purchase->date }}" class="form-control" placeholder="Type something"/>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label">Vendor</label>
                                    <select class="form-control select2" name="vendor_id">
                                        <option>Select</option>
                                        @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}" {{ $vendor->id == $purchase->vendor_id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                                            
                                        @endforeach

                                    </select>
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

