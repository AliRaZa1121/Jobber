@extends('layouts.auth')
@section('content')
@section('styles')

    <style>
        @media (min-width: 992px) {
            .login.login-1 .login-aside {
                width: 100%;
                max-width: 100%;
            }

            .login.login-1 .login-form {
                width: 100%;
                max-width: 100%;
            }
        }

        .checkbox>span {
            background-color: none !important;
        }

    </style>

@endsection
@section('content')
    <!--begin::Login-->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid bg-white">
        <!--begin::Content-->
        <div class="flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <!--begin::Content body-->
            <div class="container">
                <div class="pb-13 pt-lg-0 pt-5">
                    <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgotten Password ?
                    </h3>
                    <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password
                    </p>
                </div>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                {{--
                <!--begin::Signup-->
                <div class=""> --}}
                    <!--begin::Form-->
                    <!--begin::Forgot-->
                    <div class="login-form login-forgot">
                        <!--begin::Form-->
                        <form class="form" id="kt_login_forgot_form" method="POST" action="{{ route('password.email') }}" autocomplete="off">
                            <!--begin::token-->
                            @csrf
                            <!--end::token-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    type="email" placeholder="Email" name="email" required/>
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group d-flex flex-wrap pb-lg-0">
                                <button type="submit" id="kt_login_forgot_submit"
                                    class="btn btn-danger font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                                <a href="{{ route('login') }}" id="kt_login_forgot_cancel"
                                    class="btn btn-light-danger font-weight-bolder font-size-h6 px-8 py-4 my-3">Goto
                                    Login</a>
                            </div>
                            <!--end::Form group-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Forgot-->
                    <!--end::Form-->
                    {{--
                </div>
                <!--end::Signup--> --}}
            </div>
            <!--end::Content body-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
@endsection
