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

<div class="d-flex flex-column flex-lg-row flex-column-fluid bg-white">

    <div class="flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">

        <div class="container">

            <form class="form" id="million-form" method="POST" action="{{ route('million-register') }}"
                autocomplete="off">
                @csrf
                <!--begin::Title-->
                <div class="pb-13 pt-lg-0 pt-5">
                    <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Million Fellowship
                        Sign Up</h3>
                    <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your
                        account</p>
                </div>
                <!--end::Title-->
                <div class="row">

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

                </div>
                <div class="row">

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

                    <div class="form-group col-sm-6">
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                            id="confirm_password" type="password" placeholder="Confirm password" name="cpassword"
                            required />
                        @error('cpassword')
                        <div class="fv-plugins-message-container">
                            <div data-field="password" data-validator="notEmpty" class="fv-help-block">
                                {{ $message }}
                            </div>
                        </div>
                        @enderror
                    </div>
                    <input type="hidden" name="details" id="details" value="">
                    <input type="hidden" name="type" value="membership">

                </div>

                <div class="form-group">
                    <label class="checkbox mb-0">Become Million Member
                        <a href="#" class="text-danger">By Just Paying $25.00</a>.
                    </label>
                </div>


                <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
                    <button type="submit" id="kt_login_signup_submit"
                        class="btn btn-danger font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Pay and
                        Proceed</button>
                    <a href="{{ route('home') }}"
                        class="btn btn-light-danger font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</a>
                </div>

            </form>
        </div>
    </div>

</div>
@include('admin.advertisements.modal')
@endsection
@section('scripts')
<script>
    $('#million-form').submit(function(e) {
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
                        $('#paymentModal').show();
                        initPaypal(25, 'million-form');
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
