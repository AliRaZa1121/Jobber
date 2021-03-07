@php
use App\Functions\Helper;
@endphp
@extends('layout.default')
@section('content')

<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Users
                <div class="text-muted pt-2 font-size-sm">All Users List</div>
            </h3>
        </div>
        <div class="card-toolbar">
            
            <!--begin::Button-->
            <a href="{{ route('users.create') }}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <circle fill="#000000" cx="9" cy="15" r="6" />
                        <path
                        d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                        fill="#000000" opacity="0.3" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>New Record</a>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="" id="myTable" style="width: 100%;" border="0">
            <thead>
                <tr>
                    <th title="Field #1">#</th>
                    <th title="Field #2">User</th>
                    <th title="Field #3">Country</th>
                    {{-- <th title="Field #4">Companies</th> --}}
                    <th title="Field #6">Status</th>
                    <th title="Field #7">User Type</th>
                    <th title="Field #5">Joined At</th>
                    <th title="Field #8">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                @php
                $image = Helper::ifUserHasImage($user->image);
                @endphp
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            @if (!$image)
                            <span class="symbol symbol-35 symbol-light-success">
                                <span
                                class="symbol-label font-size-h5 font-weight-bold">{{ $user->name[0] }}</span>
                            </span>
                            
                            @else
                            <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                                <img src="{{ asset($image) }}" alt="">
                            </div>
                            @endif
                            <div class="ml-4">
                                <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                    {{ $user->name }}
                                </div>
                                <a href="#"
                                class="text-muted font-weight-bold text-hover-primary">{{ $user->email }}</a>
                            </div>
                        </div>
                    </td>
                    <td>{{ $user->country }}</td>
                    {{-- <td>
                        @if (count($user->companies) > 0)
                        @foreach ($user->companies as $company)
                        -- {{ $company->name }}
                        @endforeach
                        @else
                        None
                        @endif
                    </td> --}}
                    
                    <td align="left">
                        <span style="width: 157px;">
                            <span
                            class="label label-lg font-weight-bold  {{ $user->status == 0 ? 'label-light-danger' : 'label-light-success' }} label-inline">
                            {{ $user->status == 0 ? 'Inactive' : 'Active' }}
                        </span>
                    </span>
                </td>
                @php
                if($user->role->slug == 'user'){
                    $class = 'info'; 
                    $text = 'User';
                }
                if($user->role->slug == 'vendor'){
                    $class = 'success'; 
                    $text = 'Vendor';
                }
                if($user->role->slug == 'million-member'){
                    $class = 'primary'; 
                    $text = 'Million Member';
                }
                if($user->role->slug == 'team'){
                    $class = 'warning'; 
                    $text = 'Team Member';
                }
                
                @endphp
                <td align="left">
                    <span style="width: 157px;">
                        <span
                        class="label label-lg font-weight-bold  label-light-{{$class}} label-inline">
                        {{ $text }}
                    </span>
                </span>
            </td>
            <td>{{ $user->created_at != '' || $user->created_at != null ? $user->created_at->format('Y-m-d') : '' }}
            </td>
            <td>
                {{-- <a href="{{ route('companies.create', $user->identity_token) }}"
                    class="btn btn-md btn-default btn-hover-info text-info">
                    Add Company
                </a> --}}
                <a href="{{ route('users.edit', $user->identity_token) }}"
                    class="btn btn-sm btn-default btn-hover-info btn-icon">
                    <i class="flaticon-edit"></i>
                </a>
                <a href="javascript:;" data-url="{{ route('users.delete', $user->id) }}"
                    class="btn btn-sm btn-default btn-hover-danger btn-icon delete">
                    <i class="flaticon2-rubbish-bin-delete-button"></i>
                </a>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>
<!--end: Datatable-->
</div>
</div>

@include('admin.users.modal')

@endsection


{{-- Scripts Section --}}
@section('scripts')
@include('admin.commons.js')
@endsection
