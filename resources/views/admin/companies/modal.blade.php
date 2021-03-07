@inject('helper', 'App\Functions\Helper')
@php
$image = $helper->ifUserHasImage($company->image);
@endphp
<div class="card-body pt-4">
    <div class="d-flex align-items-end mb-7">
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                @if (!$image)
                <span class="symbol symbol-35 symbol-light-success">
                    <span class="symbol-label font-size-h5 font-weight-bold">{{ $company->name[0] }}</span>
                </span>
                @else
                <div class="symbol symbol-circle symbol-lg-75">
                    <img src="{{ asset($image) }}" alt="image">
                </div>
                @endif
                
                <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                    <span class="font-size-h3 font-weight-boldest">JM</span>
                </div>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0"
                id="user-name">{{ $company->name }}</a>
                <span class="text-muted font-weight-bold" id="user-role">By: <span class="text-primary">{{ $company->user->name }}</span></span>
            </div>
        </div>
    </div>
    
    <div class="mb-7">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
            <span class="text-muted text-hover-primary">{{ $company->email }}</span>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-dark-75 font-weight-bolder mr-2">Phone:</span>
            <span class="text-muted text-hover-primary">{{ $company->phone }}</span>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-dark-75 font-weight-bolder mr-2">Address:</span>
            <span class="text-muted text-hover-primary">{{ $company->address }}</span>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-dark-75 font-weight-bolder mr-2">Website:</span>
            <a href="{{ $company->website }}" class="text-muted text-hover-primary">Goto Website</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-dark-75 font-weight-bolder mr-2">Status:</span>
                <span class="text-muted text-hover-primary"><span style="width: 157px;">
                    <span
                    class="label label-lg font-weight-bold  {{ $company->is_verified == 0 ? 'label-light-danger' : 'label-light-success' }} label-inline">
                    {{ $company->is_verified == 0 ? 'Not Verified' : 'Verified' }}
                </span>
            </span></span>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-dark-75 font-weight-bolder mr-2">Created At:</span>
            <span class="text-muted text-hover-primary">{{ $company->created_at != '' || $company->created_at != null ? $company->created_at->format('Y-m-d') : '' }}</span>
        </div>
        
    </div>
    <span class="btn btn-block btn-sm btn-danger font-weight-bolder text-uppercase py-4 close">Close</span>
</div>
