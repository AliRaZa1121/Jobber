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
{{--
<!--begin::Main-->
<div class="d-flex flex-column flex-root"> --}}
    <!--begin::Login-->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid bg-white">
        <!--begin::Content-->
        <div
            class="flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <!--begin::Content body-->
            <div class="container">
                {{--
                <!--begin::Signup-->
                <div class=""> --}}
                    <!--begin::Form-->
                    <form class="form" id="register-form" method="POST" action="{{ route('register') }}"
                        autocomplete="off">
                        @csrf
                        <!--begin::Title-->
                        <div class="pb-13 pt-lg-0 pt-5">
                            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up</h3>
                            <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your
                                account</p>
                        </div>
                        <!--end::Title-->
                        <div class="row">
                            <!--begin::Form group-->
                            <div class="form-group col-sm-6">
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    id="name" type="text" placeholder="Fullname" name="name" value="{{ old('name') }}"
                                    required />
                                @error('name')
                                <div class="fv-plugins-message-container">
                                    <div data-field="password" data-validator="notEmpty" class="fv-help-block">
                                        {{ $message }}
                                    </div>
                                </div>
                                @enderror
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group col-sm-6">
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                                    required />
                                @error('email')
                                <div class="fv-plugins-message-container">
                                    <div data-field="password" data-validator="notEmpty" class="fv-help-block">
                                        {{ $message }}
                                    </div>
                                </div>
                                @enderror
                            </div>
                            <!--end::Form group-->
                        </div>
                        <div class="row">
                            <!--begin::Form group-->
                            <div class="form-group col-sm-6">
                                <select name="role_id" id="role_id" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6">
                                    <option value="">Who are you?</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Form group-->
                        </div>
                        <div class="row">
                            <!--begin::Form group-->
                            <div class="form-group col-sm-6">
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    id="password" type="password" placeholder="Password" name="password" required />
                                @error('password')
                                <div class="fv-plugins-message-container">
                                    <div data-field="password" data-validator="notEmpty" class="fv-help-block">
                                        {{ $message }}
                                    </div>
                                </div>
                                @enderror
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group col-sm-6">
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    id="confirm_password" type="password" placeholder="Confirm password"
                                    name="cpassword" required />
                                @error('cpassword')
                                <div class="fv-plugins-message-container">
                                    <div data-field="password" data-validator="notEmpty" class="fv-help-block">
                                        {{ $message }}
                                    </div>
                                </div>
                                @enderror
                            </div>
                            <input type="hidden" name="details" id="details" value="">
                            <!--end::Form group-->
                        </div>
                        <!--begin::Form group-->
                        <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
                            <button type="submit" id="kt_login_signup_submit"
                                class="btn btn-danger font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                            <a href="{{ route('home') }}"
                                class="btn btn-light-danger font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</a>
                            {{-- <a type="button" id="kt_login_signup_cancel"
                                class="btn btn-light-danger font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
                                --}}
                        </div>
                        <!--end::Form group-->
                    </form>
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
    {{--
</div>
<!--end::Main--> --}}
@endsection
@section('scripts')
<script>
    $('#register-form').submit(function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        if ($('#confirm_password').val() != $('#password').val()) {
            toastr.error('Password did not match with confirm password');
        } else {

            const email = $('#email').val();
            const endpoint = '{!!  url("user/check/' + email + '") !!}';
            const result = axios.get(endpoint)
                .then(res => {
                    if (res.data === 404) {
                        document.getElementById('register-form').submit();
                    } else {
                        toastr.error('User with this email already exists');
                        return false;
                    }
                })
                .catch(error => toastr.error(error))
        }
    });

</script>
@endsection
