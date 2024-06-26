<x-app-layout>

    <!--begin::Card-->
    <div class="card">
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title d-block">
                <h2>Update Document Applicant</h2>
                <h4 class="fw-bold fs-6 mb-2 mt-2">Management of Document Applicant</h4>
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
                                            <label class="required fw-bold fs-6 mb-2">Code</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="code"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Fill Code    "  value="{{ $data->code }}"/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">Title</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="title"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Fill Title    "  value="{{ $data->title }}"/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label class="required fs-6 fw-bold mb-2">Type</label>
                                            <select class="form-select form-select-solid" data-control="select2"
                                                data-hide-search="true" data-placeholder="Select a document Type"
                                                name="type">
                                                <option value="{{ $data->type }}">{{ $data->type }} </option>
                                                <option value="Perorangan">Perorangan</option>
                                                <option value="Badan Usaha">Badan Usaha</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <label class="required fs-6 fw-bold mb-2">Is Mandatory?</label>
                                            <div class="fs-7 text-muted">Check to make field mandatory</div>
                                            <label class="form-check form-check-custom form-check-solid me-10 mt-4">
                                                <input class="form-check-input h-20px w-20px" type="checkbox" name="mandatory" value="true" {{ $data->is_mandatory ? 'checked' : '' }} />
                                                <span class="form-check-label fw-bold">Yes</span>
                                            </label>
                                        </div>
                                        <!--end::Input group-->
                </div>
                <!--end::Scroll-->
                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <a href="{{ route('document.index') }}" class="btn btn-danger">
                        <span class="indicator-label">Back</span>
                    </a>
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
        <script src="{{ asset('tadmin/js/custom/document/edit.js') }}"></script>
    @endsection
</x-app-layout>