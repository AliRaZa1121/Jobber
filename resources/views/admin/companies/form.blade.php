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
                        <span class="nav-text font-size-lg">Company</span>
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
        <form class="form" id="kt_form" method="post" action="{{($company->id === null)?route('companies.store'):route('companies.update', $company->id)}}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{($company->id === null)?$user->id:$company->user_id}}">
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
                                    <h6 class="text-dark font-weight-bold mb-10">Company Info:</h6>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Group-->
                            @php
                            if($company->id === null){
                                $image = asset('media/users/blank.png');
                            }
                            else{
                                $temp = Helper::ifUserHasImage($company->image);	
                                $image = asset($temp);
                            }
                            @endphp
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Company Logo</label>
                                <div class="col-9">
                                    <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url('{{$image}}')">
                                        <div class="image-input-wrapper"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="profile_avatar_remove" />
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Name</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" value="{{($company->id === null)?old('name'):$company->name}}" placeholder="Name" required />
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Company Email</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-at"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control form-control-lg form-control-solid" name="email" value="{{($company->id === null)?old('email'):$company->email}}" placeholder="Email" required />
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Company Website</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-at"></i>
                                            </span>
                                        </div>
                                        <input type="url" class="form-control form-control-lg form-control-solid" name="website" value="{{($company->id === null)?old('website'):$company->website}}" placeholder="Website" />
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Contact Phone</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="phone" value="{{($company->id === null)?old('phone'):$company->phone}}" placeholder="Phone" required />
                                    </div>
                                    {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Address</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-address-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="address" value="{{($company->id === null)?old('address'):$company->address}}" placeholder="Address" required />
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Category</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        {{-- <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-address-card"></i>
                                            </span>
                                        </div> --}}
                                        <select name="category_id" id="category_id" class="form-control form-control-lg form-control-solid select2" required>
                                            @php
                                            if($company->id === null){
                                                $savedCat = old('category');
                                            }
                                            else{
                                                $savedCat = $company->category_id;
                                            }
                                            @endphp
                                            <option value="">Select country</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{($category->id == $savedCat)?'selected':''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            @if(Auth::user()->role->slug == 'admin')
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Status</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <select name="is_verified" id="is_verified" class="form-control form-control-lg form-control-solid" required>
                                            <option value="1" {{($company->is_verified == '1')?'selected':''}}>Verified</option>
                                            <option value="0" {{($company->is_verified == '0')?'selected':''}}>Not Verified</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Description</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{($company->id === null)?old('description'):$company->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">Company Site</label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Username" value="loop" />
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
                        {{-- <div class="separator separator-dashed my-10"></div> --}}
                        <!--begin::Footer-->
                        <div class="card-footer pb-0">
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-7">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-9">
                                            <input type="submit" class="btn btn-light-primary font-weight-bold" value="Save changes">
                                            <a href="{{route('companies')}}" class="btn btn-clean font-weight-bold">Cancel</a>
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
    @section('scripts')
    <script src="{{asset('js/pages/custom/user/edit-user.js')}}"></script>
    @include('admin.commons.js')
    @endsection