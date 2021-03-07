@extends('layout.default')

@section('content')

<div class="row mb-5">
    <div class="col-12">
        <div class="alert alert-custom alert-light-danger fade show py-4" role="alert">
            <div class="alert-icon">
                <i class="flaticon-warning"></i>
            </div>
            <div class="alert-text font-weight-bold">News.
                <br>Dashboard Coming Soon
                <br>
                
                @if(Auth::user()->role->slug == 'admin')
                <h1>This Dashboard is for Admin</h1>
                @elseif(Auth::user()->role->slug == 'coach')
                <h1>This Dashboard is for Coach</h1>
                @elseif(Auth::user()->role->slug == 'player')
                <h1>This Dashboard is for Player</h1>
                @endif
            </div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    {{-- <span aria-hidden="true">
                        <i class="la la-close"></i>
                    </span> --}}
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
