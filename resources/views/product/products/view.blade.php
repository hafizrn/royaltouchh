@extends('layouts.master')

@section('title', 'Product Details')

@section('css')
@endsection

@section('breadcrumb')
<h3 class="page-title">Home > Product Details</h1>
@endsection

@section('content')
                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="invoice-title">
                                                        <h4 class="pull-right font-16"><a class="text-muted" href="/product/edit/{{$product->code}}"><i class="mdi mdi-pencil font-18"></i></a> <strong>Product Code: {{ $product->code }}</strong></h4>
                                                        
                                                        <h3 class="m-t-0">
                                                            <img src="{{ URL::asset('img/'.$product->image) }}" alt="logo" height="150"/>
                                                            
                                                        </h3>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="panel panel-default">
                                                                <div class="p-2">
                                                                    <h3 class="panel-title font-20"><strong>{{ $product->name_english }}</strong></h3>
                                                                </div>
                                                                <div class="">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <tbody>
                                                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                                            <tr>
                                                                                <td>Product Name: </td>
                                                                                <td>{{ $product->name_english }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Product Bangla Name: </td>
                                                                                <td>{{ $product->name_bangla }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Product Code: </td>
                                                                                <td>{{ $product->code }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>brand: </td>
                                                                                <td>{{ $product->brand }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>measurement: </td>
                                                                                <td>{{ $product->measurement }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>category: </td>
                                                                                <td>{{ $category->name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>type: </td>
                                                                                <td>{{ $type->name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Stock: </td>
                                                                                <td>{{ $product->stock }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>purchase_date: </td>
                                                                                <td>{{ $product->purchase_date }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Buy Price: </td>
                                                                                <td>{{ $product->buy_price }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Sell Price: </td>
                                                                                <td>{{ $product->sell_price }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Shipping Cost: </td>
                                                                                <td>{{ $product->shipping_cost }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>discount: </td>
                                                                                <td>{{ $product->discount }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>description: </td>
                                                                                <td>{!! $product->description  !!}</td>
                                                                            </tr>
                                                                            
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
        
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row -->
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div><!-- container -->
                    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
@endsection

