
<!-- Button trigger modal-->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
</button> --}}

<!-- Modal-->
<div class="modal fade show" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            
            <div class="modal-body">
                {{-- content --}}
                <!--begin::Body-->
                <div class="card-body pt-4">
                    <!--begin::User-->
                    <div class="d-flex align-items-end mb-7">
                        <!--begin::Pic-->
                        <div class="d-flex align-items-center">
                            <!--begin::Pic-->
                            <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                <div class="symbol symbol-circle symbol-lg-75">
                                    <img src="{{asset('media/users/100_1.jpg')}}" alt="image">
                                </div>
                                <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                                    <span class="font-size-h3 font-weight-boldest">JM</span>
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Title-->
                            <div class="d-flex flex-column">
                                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0" id="user-name">Luca Doncic</a>
                                <span class="text-muted font-weight-bold" id="user-role">Head of Development</span>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::User-->
                    <!--begin::Desc-->
                    {{-- <p class="mb-7">
                        I distinguish three <a href="#" class="text-primary pr-1">#XRS-54PQ</a> objectives First
                        objectives and nice cooked rice
                    </p> --}}
                    <!--end::Desc-->
                    <!--begin::Info-->
                    <div class="mb-7">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
                            <a href="#" class="text-muted text-hover-primary">luca@festudios.com</a>
                        </div>
                        <div class="d-flex justify-content-between align-items-cente my-1">
                            <span class="text-dark-75 font-weight-bolder mr-2">Phone:</span>
                            <a href="#" class="text-muted text-hover-primary">44(76)34254578</a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
                            <span class="text-muted font-weight-bold">Barcelona</span>
                        </div>
                    </div>
                    <!--end::Info-->
                    <a href="#" class="btn btn-block btn-sm btn-light-warning font-weight-bolder text-uppercase py-4">view companies</a>
                </div>
                <!--end::Body-->
                {{-- Content --}}
            </div>
            
            
            
            
            
        </div>
    </div>
</div>