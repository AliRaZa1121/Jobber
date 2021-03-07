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
                        <span class="nav-text font-size-lg">Package</span>
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
        <form class="form" id="kt_form" method="post" action="{{($package->id === null)?route('packages.store'):route('packages.update', $package->id)}}" autocomplete="off" enctype="multipart/form-data">
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
                                    <h6 class="text-dark font-weight-bold mb-10">Package Info:</h6>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Name</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" value="{{($package->id === null)?old('name'):$package->name}}" placeholder="Name" required />
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Price</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        {{-- <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-at"></i>
                                            </span>
                                        </div> --}}
                                        <input type="number" class="form-control form-control-lg form-control-solid" min="1" max="999" name="price" value="{{($package->id === null)?old('price'):$package->price}}" placeholder="Price (10.99)" step="any" required />
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Duration</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <select name="duration" id="duration" class="form-control form-control-lg form-control-solid" required>
                                            <option value="">Select duration</option>
                                            <option value="weekly" {{($package->duration == 'weekly')?'selected':''}}>Weekly</option>
                                            <option value="monthly" {{($package->duration == 'monthly')?'selected':''}}>Monthly</option>
                                            <option value="yearly" {{($package->duration == 'yearly')?'selected':''}}>Yearly</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Description</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        {{-- <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                        </div> --}}
                                        <textarea name="description" id="" class="form-control" cols="30" rows="10" required>{{($package->id === null)?old('description'):$package->description}}</textarea>
                                    </div>
                                    {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                                </div>
                            </div>
                            <!--end::Group-->
                        </div>
                    </div>
                    <!--end::Row-->
                    <div class="separator separator-dashed my-10"></div>
                    <!--begin::Footer-->
                    <div class="card-footer pb-0">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7">
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-9">
                                        <input type="submit" class="btn btn-light-primary font-weight-bold" value="Save changes">
                                        <a href="{{route('packages')}}" class="btn btn-clean font-weight-bold">Cancel</a>
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