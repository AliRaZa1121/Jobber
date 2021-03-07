@php
use App\Functions\Helper;
@endphp
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <!--begin::Header Nav-->
                
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Actions-->
                    <a href="#" class="btn btn-light btn-sm font-weight-bold mr-2" id="kt_dashboard_daterangepicker">
                        <span class="text-muted font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today:</span>
                        <span class="text-danger font-weight-bold" id="kt_dashboard_daterangepicker_date">{{ date("M d") }} </span>
                        <span class="ml-2 font-weight-bold">
                            <i class="flaticon2-calendar-9 text-muted"></i>
                        </span>
                    </a>
                    {{-- <a href="{{route('dashboard')}}" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Dashboard</a> --}}
                    {{-- @if (Auth::user()->role->slug === 'admin') --}}
                    {{-- <a href="{{route('users')}}" class="btn btn-light-success font-weight-bolder btn-sm mr-2">Users</a>
                    <a href="{{route('packages')}}" class="btn btn-light-info font-weight-bolder btn-sm mr-2">Packages</a>
                    <a href="{{route('categories')}}" class="btn btn-light-warning font-weight-bolder btn-sm mr-2">Categories</a>
                    <a href="{{route('companies')}}" class="btn btn-light-danger font-weight-bolder btn-sm mr-2">Companies</a> --}}
                    {{-- @else --}}
                    {{-- <a href="{{route('users.edit', Auth::user()->id)}}" class="btn btn-light-success font-weight-bolder btn-sm mr-2">Profile</a>
                    <a href="{{route('companies.user')}}" class="btn btn-light-danger font-weight-bolder btn-sm mr-2">Companies</a> --}}
                    {{-- @endif --}}
                    <!--end::Actions-->
                </div>
                
                <!--end::Header Nav-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->
        <!--begin::Topbar-->
        @php
        $image = Helper::ifUserHasImage(Auth::user()->image);	
        @endphp
        <div class="topbar">
            <!--begin::User-->
            <div class="topbar-item">
                <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{Auth::user()->name}}</span>
                    @if(!$image)
                    <span class="symbol symbol-35 mr-5 symbol-light-success">
                        <span class="symbol-label font-size-h5 font-weight-bold">{{Auth::user()->name[0]}}</span>
                        <i class="symbol-badge bg-success"></i>
                    </span>
                    @else
                    <div class="symbol symbol-35 mr-5">
                        <div class="symbol-label" style="background-image:url('{{asset($image)}}')"></div>
                        <i class="symbol-badge bg-success"></i>
                    </div>
                    @endif
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>