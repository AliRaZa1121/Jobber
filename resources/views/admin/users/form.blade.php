@php
use App\Functions\Helper;
@endphp
@extends('layout.default')
@section('content')

    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Card header-->
        <div class="card-header card-header-tabs-line nav-tabs-line-3x">
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                    <!--begin::Item-->
                    <li class="nav-item mr-3">
                        <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                            <span class="nav-icon">

                                <i class="flaticon-user-ok"></i>
                            </span>
                            <span class="nav-text font-size-lg">Profile</span>
                        </a>
                    </li>
                    <!--end::Item-->

                </ul>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body px-0">
            <form class="form" id="kt_form" method="post"
                action="{{ $user->id === null ? route('users.store') : route('users.update', $user->id) }}"
                autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="tab-content">
                    <!--begin::Tab-->
                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7 my-2">
                                <!--begin::Row-->
                                <div class="row">
                                    <label class="col-3"></label>
                                    <div class="col-9">
                                        <h6 class="text-dark font-weight-bold mb-10">Customer Info:</h6>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Group-->
                                @php
                                if($user->id === null){
                                $image = asset('media/users/blank.png');
                                }
                                else{
                                $image = (Helper::ifUserHasImage($user->image))?asset(Helper::ifUserHasImage($user->image)):asset('media/users/blank.png');
                                }
                                @endphp
                                <div class="form-group row" id="banner-image">
                                    <label class="col-form-label col-3 text-lg-right text-left">User Image <span
                                            class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <div class="image-input image-input-empty image-input-outline blah" id="blah"
                                            style="background-image: url('{{ $image }}')">
                                            <div class="image-input-wrapper"></div>
                                            <label
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="change" data-toggle="tooltip" title=""
                                                data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="profile_avatar" id="profile_avatar"
                                                    class="upload-img" data-width="200" data-height="200" />
                                                <input type="hidden" name="profile_avatar_remove" />
                                            </label>
                                            <span
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                            <span
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                        <p class="text-muted">Image should be greater or equal to 200 X 200 resolution</p>
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">Full Name</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                            name="name" value="{{ $user->id === null ? old('name') : $user->name }}"
                                            placeholder="Name" required />
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">Email Address<span
                                        class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-at"></i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control form-control-lg form-control-solid"
                                                name="email" value="{{ $user->id === null ? old('email') : $user->email }}"
                                                placeholder="Email" required />
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">Contact Phone<span
                                        class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-phone"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="phone" value="{{ $user->id === null ? old('phone') : $user->phone }}"
                                                placeholder="Phone" required />
                                        </div>
                                        {{-- <span class="form-text text-muted">We'll never
                                            share your email with anyone else.</span> --}}
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">Address<span
                                        class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-address-card"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="address"
                                                value="{{ $user->id === null ? old('address') : $user->address }}"
                                                placeholder="Address" required />
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">City<span
                                        class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-address-card"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="city" value="{{ $user->id === null ? old('city') : $user->city }}"
                                                placeholder="City" required />
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">Country<span
                                        class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            {{-- <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-address-card"></i>
                                                </span>
                                            </div> --}}
                                            <select name="country" id="country"
                                                class="form-control form-control-lg form-control-solid select2" required>
                                                @php
                                                if($user->id === null){
                                                $savedCountry = old('country');
                                                }
                                                else{
                                                $savedCountry = $user->country;
                                                }
                                                @endphp
                                                <option value="">Select country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->name }}"
                                                        {{ $country->name == $savedCountry ? 'selected' : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                @if (Auth::user()->role->slug == 'admin')
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Role<span
                                            class="text-danger">*</span></label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <select name="role_id" id="role_id"
                                                    class="form-control form-control-lg form-control-solid" required>
                                                    <option value="">Select Role</option>
                                                    @foreach ($roles as $role)
                                                        @if ($role->name !== 'Admin')
                                                            <option value="{{ $role->id }}"
                                                                {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                                                {{ $role->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!--end::Group-->
                                <!--begin::Group-->
                                @if (Auth::user()->role->slug == 'admin')
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Status<span
                                            class="text-danger">*</span></label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <select name="status" id="status"
                                                    class="form-control form-control-lg form-control-solid" required>
                                                    <option value="1" {{ $user->status == '1' ? 'selected' : '' }}>Active
                                                    </option>
                                                    <option value="0" {{ $user->status == '0' ? 'selected' : '' }}>Inactive
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!--end::Group-->
                                <!--end::Group-->

                                {{--
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">Company Site</label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                placeholder="Username" value="loop" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">.com</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group--> --}}
                            </div>
                        </div>
                        <!--end::Row-->
                        <div class="separator separator-dashed my-10"></div>
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7">
                                <!--begin::Row-->
                                <div class="row">
                                    <label class="col-3"></label>
                                    <div class="col-9">
                                        <h6 class="text-dark font-weight-bold mb-10">
                                            {{ $user->id === null ? 'Set Password' : 'Change Password' }}</h6>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">New Password<span
                                        class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid" type="password"
                                            value="" placeholder="new password" name="password" id="password"
                                            {{ $user->id === null ? 'required' : '' }} />
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">Verify Password<span
                                        class="text-danger">*</span></label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid" type="password"
                                            value="" placeholder="confirm password" name="cpassword" id="cpassword"
                                            {{ $user->id === null ? 'required' : '' }} />
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Footer-->
                        <div class="card-footer pb-0">
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-7">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-9">
                                            <input type="submit" class="btn btn-light-primary font-weight-bold"
                                                value="Save changes">
                                            <a href="{{ route('users') }}" class="btn btn-clean font-weight-bold">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Tab-->
                </div>
            </form>
        </div>
        <!--begin::Card body-->
    </div>
    <!--end::Card-->

@endsection



{{-- Scripts Section --}}
@section('scripts')
    @include('admin.commons.js')
    <script>
        $(document).ready(function() {
            // $('input[name="phone"]').mask('000 00 000 0000');
            $('#kt_form').submit(function(e) {
                e.preventDefault();
                var $userID = '<?php echo $user->id; ?>';
                var $password = $('#password').val();
                var $cpassword = $('#cpassword').val();
                if ($userID == '') {
                    if ($password !== $cpassword) {
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-center",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                        toastr.error("Your password confirmation does not match");
                        return false;
                    } else {
                        document.getElementById('kt_form').submit();
                    }
                } else {
                    if ($password != '' && $password !== $cpassword) {
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-center",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                        toastr.error("Your password confirmation does not match");
                        return false;
                    } else {
                        document.getElementById('kt_form').submit();
                    }
                }

            });
        });

    </script>
@endsection
