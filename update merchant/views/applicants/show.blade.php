<x-app-layout>
    <!--begin::Navbar-->
    <div class="card mb-4">
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <!--begin::User-->
                        <div class="d-flex flex-column">
                            <!--begin::Name-->
                            <div class="d-flex align-items-center mb-2">
                                <a href="#"
                                    class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ $data->nama_merchant }}</a>
                                @if ($data->status_approval == 'Approved')
                                    <a href="#">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                    fill="#00A3FF" />
                                                <path class="permanent"
                                                    d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                @endif
                            </div>
                            <!--end::Name-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                <a href="#"
                                    class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                fill="black" />
                                            <path
                                                d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Merchant</a>
                                <a href="#"
                                    class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                fill="black" />
                                            <path
                                                d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{ $data->username }}</a>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-column">
                            <div class="d-flex my-2">
                                <a href="{{ url('form-merchant/' . $data->token_applicant) }}"
                                    class="btn btn-sm btn-light me-2" target="_BLANK">
                                    <!--begin::Indicator-->
                                    <span class="indicator-label">Form Registration Merchant</span>
                                    <!--end::Indicator-->
                                </a>

                                <a href="{{ url('form-edc/' . $data->token_applicant) }}"
                                    class="btn btn-sm btn-light me-2" target="_BLANK">
                                    <!--begin::Indicator-->
                                    <span class="indicator-label">Form M2</span>
                                    <!--end::Indicator-->
                                </a>
                                <a href="{{ route('applicant.branch', $data->token_applicant) }}"
                                    class="btn btn-sm btn-primary me-2">Cabang</a>
                                <a href="{{ route('applicant.payment', $data->token_applicant) }}"
                                    class="btn btn-sm btn-success me-2">Fitur Pembayaran</a>

                            </div>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Title-->
                    <!--begin::Stats-->
                    <div class="d-flex flex-wrap flex-stack">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1 pe-8">
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap">
                                <!--begin::Stat-->
                                @foreach ($approvals as $item)
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                                        rx="1" transform="rotate(90 13 6)" fill="black" />
                                                    <path
                                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <div class="fs-5 fw-bolder">{{ $item->status }}</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bolder fs-8 text-gray-400 text-center">
                                            {{ App\Helpers\Utils::getUserRole($item->user->id) }}</div>
                                        <div class="fw-bold fs-8 text-gray-400 text-center">{{ $item->user->name }}
                                        </div>
                                        <div class="fw-bold fs-8 text-gray-400 text-center">
                                            {{ $item->created_at->format('d M Y') }}</div>
                                        {{-- <div class="fw-bold fs-8 text-gray-400 text-center">
                                            {{ $item->notes }}</div> --}}
                                        <!--end::Label-->
                                    </div>
                                @endforeach
                                <!--end::Stat-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--begin::Progress-->
                    <div class="d-flex">
                        @if ($data->status_setting_tid != null)
                            <span class="fw-bold fs-6 text-gray">Merchant TID : {{ $data->status_setting_tid }}</span>
                        @endif
                        @if ($data->status_setting_mid != null)
                            <span class="fw-bold fs-6 text-gray mx-4">Merchant MID :
                                {{ $data->status_setting_mid }}</span>
                        @endif
                    </div>
                    <div class="d-flex">
                        @if ($data->status_detail)
                            <div>
                                <div class="d-flex justify-center w-100 mt-auto mb-2">
                                    <span class="fw-bolder fs-6 text-gray">Status Data Pengajuan : </span>
                                    <span
                                        class="fw-bolder fs-6 text-gray mx-2 {{ $data->status_detail == 'Reject' ? 'text-danger' : 'text-success' }}">{{ $data->status_detail }}</span>
                                </div>
                                @if ($data->status_detail == 'Reject')
                                    <div class="d-flex justify-center w-100 mt-auto mb-2">
                                        <span class="fw-bolder fs-6 text-gray">Alasan : </span>
                                        <span class="fw-bold fs-6 text-gray mx-2">{{ $data->alasan_detail }}</span>
                                    </div>
                                @endif
                                <div class="d-flex justify-center w-100 mt-auto mb-2">
                                    <span class="fw-bolder fs-6 text-gray">Catatan : </span>
                                    <span class="fw-bold fs-6 text-gray mx-2">{{ $data->catatan_detail }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="mx-4">
                            <div class="d-flex justify-center w-100 mt-auto mb-2">
                                <span class="fw-bolder fs-6 text-gray">Status Data Document : </span>
                                <span
                                    class="fw-bolder fs-6 text-gray mx-2 {{ $data->status_approval == 'Reject' || $data->status_approval == 'Close' ? 'text-danger' : 'text-success' }}">{{ $data->status_approval }}</span>
                            </div>
                            @if ($data->status_approval == 'Reject')
                                <div class="d-flex justify-center w-100 mt-auto mb-2">
                                    <span class="fw-bolder fs-6 text-gray">Alasan : </span>
                                    <span class="fw-bold fs-6 text-gray mx-2">{{ $data->reason }}</span>
                                </div>
                            @endif
                            @if ($data->catatan)
                                <div class="d-flex justify-center w-100 mt-auto mb-2">
                                    <span class="fw-bolder fs-6 text-gray">Catatan : </span>
                                    <span class="fw-bold fs-6 text-gray mx-2">{{ $data->catatan }}</span>
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="d-flex">
                        <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                            <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                <span class="fw-bold fs-6 text-gray">Document Completion</span>
                                <span class="fw-bolder fs-6">{{ $documentCompleation }}%</span>
                            </div>
                            <div class="h-5px mx-3 w-100 bg-light mb-3">
                                <div class="bg-{{ $documentCompleation < 100 ? 'primary' : 'success' }} rounded h-5px"
                                    role="progressbar" style="width: {{ $documentCompleation }}%;"
                                    aria-valuenow="{{ $documentCompleation }}" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3 mx-7">
                            <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                <span class="fw-bold fs-6 text-gray">Document Approval Completion</span>
                                <span class="fw-bolder fs-6">{{ $documentApprovalCompleation }}%</span>
                            </div>
                            <div class="h-5px mx-3 w-100 bg-light mb-3">
                                <div class="bg-{{ $documentApprovalCompleation < 100 ? 'primary' : 'success' }} rounded h-5px"
                                    role="progressbar" style="width: {{ $documentApprovalCompleation }}%;"
                                    aria-valuenow="{{ $documentApprovalCompleation }}" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                        @if (Auth::user()->role_id == 1)
                            <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                <div class="d-flex justify-content-between w-100 mt-auto">
                                    <span class="fw-bold fs-6 text-gray">Assign Layer</span>
                                </div>
                                <div class="h-5px mx-3 w-100 mb-3">
                                    <select onchange="assignLayer()" id="approvalStatus" name="status_approval"
                                        aria-label="Select Recomendation"
                                        class="form-select form-select-sm form-select-solid">
                                        <option value="">-- Select Layer --</option>
                                        @foreach ($layers as $lay)
                                            <option value="{{ $lay->id }}">{{ $lay->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif

                    </div>
                    <!--end::Progress-->
                    <!--end::Stats-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                <li class="nav-item mt-1">
                    <a class="nav-link text-active-primary ms-0 me-10 py-3 active" data-bs-toggle="tab"
                        href="#kt_tab_pane_1">Merchant Detail</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link text-active-primary ms-0 me-10 py-3" data-bs-toggle="tab"
                        href="#kt_tab_pane_2">Documents</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link text-active-primary ms-0 me-10 py-3" data-bs-toggle="tab"
                        href="#kt_tab_pane_3">Payment Features</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link text-active-primary ms-0 me-10 py-3" data-bs-toggle="tab"
                        href="#kt_tab_pane_4">Proof of Payment</a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link text-active-primary ms-0 me-10 py-3" data-bs-toggle="tab"
                        href="#kt_tab_pane_5">History Merchant Approval</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="mb-4">
        <div class="pt-5 pb-5">
            <!--begin::Details-->
            <div class="">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                        @include('admin.applicants.tabs.detail-merchant')
                    </div>

                    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                        @include('admin.applicants.tabs.documents')

                    </div>

                    <div class="tab-pane fade row" id="kt_tab_pane_3" role="tabpanel">
                        @include('admin.applicants.tabs.payments')
                    </div>

                    <div class="tab-pane fade row" id="kt_tab_pane_4" role="tabpanel">
                        @include('admin.applicants.tabs.proof')
                    </div>

                    <div class="tab-pane fade row" id="kt_tab_pane_5" role="tabpanel">
                        @include('admin.applicants.tabs.merchant-applicant-history')
                    </div>
                </div>
            </div>
            <!--end::Details-->
        </div>
    </div>
    <!--end::Navbar-->
    @section('scripts')
        <script src="{{ asset('tadmin/js/custom/applicant/updateDetail.js') }}"></script>
        <script src="{{ asset('tadmin/js/custom/applicant/index.js') }}"></script>
        <script src="{{ asset('tadmin/js/custom/applicant/custom.js') }}"></script>
        <script>
            function assignLayer() {
                var selectedValue = $('#approvalStatus').val();
                var token = `{{ $data->token_applicant }}`;

                if (selectedValue !== '') {
                    $.ajax({
                        type: 'POST',
                        url: '/assign/layer',
                        data: {
                            layerId: selectedValue,
                            token
                        },
                        headers: {
                            'X-CSRF-TOKEN': `{{ csrf_token() }}`
                        },
                        success: function(response) {
                            alert("Berhasil assign layer")
                        },
                        error: function(error) {
                            console.error('Error:', error);
                        }
                    });
                }
            }
        </script>
    @endsection
</x-app-layout>
