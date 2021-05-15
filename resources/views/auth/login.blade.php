@extends('layouts.master-without-nav')

@section('content')
 <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center m-0">
                        <a href="index" class="logo logo-admin"><img src="{{ URL::asset('assets/images/logo.png') }}" height="30" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
                        <p class="text-muted text-center">Sign in to continue to Royaltouch.</p>

                        <form class="form-horizontal m-t-30" method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <label for="username">Username Hint: (admin@admin.com)</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter username">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password hint: (password)</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock    "></i> Forgot your password?</a>
                                    </a>
                                @endif
                                </div>
                                
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="text-white">Don't have an account ? <a href="pages-register" class="font-500 font-14 text-white font-secondary"> Signup Now </a> </p>
                <p class="text-white">© {{ date("Y",strtotime("-1 year")) }} - {{date('Y')}} Admiria. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
            </div>

        </div>
@endsection

@section('script')

@endsection