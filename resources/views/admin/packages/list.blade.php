@php
use App\Functions\Helper;   
@endphp
@extends('layout.default')
@section('content')

<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Packages
                <div class="text-muted pt-2 font-size-sm">All Packages List</div></h3>
            </div>
            <div class="card-toolbar">
                
                <!--begin::Button-->
                <a href="{{route('packages.create')}}" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
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
                            <th title="Field #2">Package</th>
                            <th title="Field #3">Price</th>
                            <th title="Field #4">Description</th>
                            <th title="Field #5">Duration</th>
                            <th title="Field #6">Created At</th>
                            <th title="Field #7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $key => $package)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$package->name}}</td>
                            <td>{{$package->price}}</td>
                            <td>{{$package->description}}</td>
                            <td align="left">
                                @php
                                if($package->duration == 'weekly')
                                $status = 'warning';
                                if($package->duration == 'monthly')
                                $status = 'info';
                                if($package->duration == 'yearly')
                                $status = 'success';
                                @endphp
                                <span style="width: 157px;">
                                    <span class="label label-lg font-weight-bold  label-light-{{$status}} label-inline">
                                        {{$package->duration}}
                                    </span>
                                </span>
                            </td>
                            <td>{{ ($package->created_at != ''|| $package->created_at != null)?$package->created_at->format('Y-m-d'): '' }}</td>
                            
                            <td>
                                {{-- <a href="javascript:;" data-href="{{route('packages.detail', $package->id)}}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon">
                                    <i class="flaticon-eye"></i>
                                </a> --}}
                                <a href="{{route('packages.edit', $package->id)}}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon">
                                    <i class="flaticon-edit"></i>
                                </a>
                                <a href="javascript:;" data-url="{{route('packages.delete', $package->id)}}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon delete">
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
        
        {{-- @include('admin.packages.modal') --}}
        
        @endsection
        
        @section('scripts')
        @include('admin.commons.js')
        @endsection