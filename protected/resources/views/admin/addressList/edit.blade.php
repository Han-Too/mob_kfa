<x-app-layout>

    <!--begin::Card-->
    <div class="card">
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title d-block">
                <h2>Update Address List</h2>
                <h4 class="fw-bold fs-6 mb-2 mt-2">Management of Address List</h4>
            </div>
            <!--begin::Card title-->
        </div>
        <div class='separator separator-dashed my-5'></div>
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Form-->
            <form id="form_update_user" class="form" action="#">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                    data-kt-scroll-dependencies="#kt_modal_add_user_header"
                    data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">Country</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="country" class="form-control form-control-solid mb-3 mb-lg-0"
                            placeholder="Fill country" value="{{ $data->country }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">Country Code</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="country_code" class="form-control form-control-solid mb-3 mb-lg-0"
                            placeholder="Fill country" value="{{ $data->country_code }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">Province</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="province" class="form-control form-control-solid mb-3 mb-lg-0"
                            placeholder="Fill province" value="{{ $data->province }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">City</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="city" class="form-control form-control-solid mb-3 mb-lg-0"
                            placeholder="Fill city" value="{{ $data->city }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">District</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="district" class="form-control form-control-solid mb-3 mb-lg-0"
                            placeholder="Fill district" value="{{ $data->district }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">Village</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="village" class="form-control form-control-solid mb-3 mb-lg-0"
                            placeholder="Fill village" value="{{ $data->village }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">Post Code</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="post code" class="form-control form-control-solid mb-3 mb-lg-0" minlength="1" maxlength="5"
                            placeholder="Fill post code" value="{{ $data->post_code }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-2">Reason</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea name="alasan" id="alasan" class="form-control form-control-solid mb-3 mb-lg-0"></textarea>
                        <!--end::Input-->
                    </div>
                </div>
                <!--end::Scroll-->
                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <button type="button" class="btn btn-primary" data-kt-users-modal-action="submit">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    @section('scripts')
        <script src="{{ asset('tadmin/js/custom/addressList/update.js') }}"></script>
    @endsection
</x-app-layout>
