{{-- @php
    use App\Functions\Helper;
    @endphp --}}
    @inject('helper', 'App\Functions\Helper')
    @extends('layout.default')
    @section('content')
    
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Companies
                    <div class="text-muted pt-2 font-size-sm">All Companies List</div>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                @if (Auth::user()->role->slug == 'user')
                <a href="{{ route('companies.create', Auth::user()->identity_token) }}"
                    class="btn btn-primary font-weight-bolder">
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
                </span>
                New Record</a>
                @endif
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="" id="myTable" style="width: 100%;" border="0">
                <thead>
                    <tr>
                        <th title="Field #1">#</th>
                        <th title="Field #2">Company</th>
                        {{-- <th title="Field #3">Phone</th>
                        <th title="Field #4">Address</th> --}}
                        <th title="Field #5">Website</th>
                        <th title="Field #6">Status</th>
                        <th title="Field #6">Created At</th>
                        <th title="Field #7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $key => $company)
                    @php
                    $image = $helper->ifUserHasImage($company->image);
                    @endphp
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if (!$image)
                                <span class="symbol symbol-35 symbol-light-success">
                                    <span
                                    class="symbol-label font-size-h5 font-weight-bold">{{ $company->name[0] }}</span>
                                </span>
                                @else
                                <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                                    <img src="{{ asset($image) }}" alt="">
                                </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                        {{ $company->name }}
                                    </div>
                                    <a href="javascript:;"
                                    class="text-muted font-weight-bold text-hover-primary">{{ $company->email }}</a>
                                    <br>
                                    <a href="javascript:;" class="text-muted font-weight-bold text-hover-primary">By <b
                                        class="text-primary">{{ $company->user->name }}</b></a>
                                    </div>
                                </div>
                            </td>
                            {{-- <td>{{ $company->phone }}</td>
                            <td>{{ $company->address }}</td> --}}
                            <td><a href="{{ $company->website }}" target="_blank"
                                class="btn btn-link text-success">Website</a></td>
                                <td align="left">
                                    <span style="width: 157px;">
                                        <span
                                        class="label label-lg font-weight-bold  {{ $company->is_verified == 0 ? 'label-light-danger' : 'label-light-success' }} label-inline">
                                        {{ $company->is_verified == 0 ? 'Not Verified' : 'Verified' }}
                                    </span>
                                </span>
                            </td>
                            <td>{{ $company->created_at != '' || $company->created_at != null ? $company->created_at->format('Y-m-d') : '' }}
                            </td>
                            <td>
                                @if (Auth::user()->role->slug === 'admin')
                                <a href="javascript:;" data-url="{{ route('companies.detail', $company->id) }}"
                                    class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon detail">
                                    <i class="flaticon-eye"></i>
                                </a>
                                <a href="{{ route('companies.mark.verified', $company->id) }}"
                                    class="btn btn-sm btn-default btn-hover-success {{ $company->is_verified == 0 ? '' : 'disabled' }} verification">
                                    Mark Verified
                                </a>
                                @endif
                                <a href="{{ route('companies.edit', $company->id) }}"
                                    class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon">
                                    <i class="flaticon-edit"></i>
                                </a>
                                <a href="javascript:;" data-url="{{ route('companies.delete', $company->id) }}"
                                    class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon delete">
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
        
        
        
        
        
        <!-- Modal-->
        <div class="modal fade show" id="companyModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body" id="modal-body">
                </div>
            </div>
        </div>
    </div>
    
    @endsection
    
    
    
    {{-- Scripts Section --}}
    @section('scripts')
    @include('admin.commons.js')
    <script>
        $('.detail').click(function() {
            const endpoint = $(this).attr('data-url');
            axios.get(endpoint)
            .then(response => {
                $('#modal-body').html('');
                $('#modal-body').html(response.data);
                $('#companyModal').show();
            })
            .catch(error => toastr.error(error));
        });
        
        $('.close').click(function(){
            $(this).closest('.modal').hide();
        });
        
    </script>
    @endsection
