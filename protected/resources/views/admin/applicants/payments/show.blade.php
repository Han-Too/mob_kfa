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
                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">Fitur
                                    Pembayaran {{ $data->payment }}</a>
                                    
                                <span
                                class="ms-2 badge badge-lg badge-light-{{ App\Helpers\Utils::badgeApplicant($data->internal_status) }}">{{ $data->internal_status }}</span>
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
                                    <!--end::Svg Icon-->{{ $data->merchant->nama_merchant }}</a>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->
                        <!--begin::Actions-->
                        <div class="d-flex my-4">
                            <a href="{{ URL::previous() }}"
                                class="btn btn-sm btn-danger me-2">
                                <!--begin::Indicator-->
                                <span class="indicator-label">< Back</span>
                                <!--end::Indicator-->
                            </a>
                            <a href="{{ route('applicant.show', $data->merchant->token_applicant) }}"
                                class="btn btn-sm btn-primary me-2">
                                <!--begin::Indicator-->
                                <span class="indicator-label">View Merchant</span>
                                <!--end::Indicator-->
                            </a>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Info-->
            </div>
        </div>
    </div>

    <div class="row gy-5 gx-xl-10">
        <!--begin::Col-->
        <div class="col-xl-7">
            <!--begin::Tables Widget 5-->
            <div class="card card-xl-stretch mb-5 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Summary Process</span>
                        <span class="text-muted mt-1 fw-bold fs-7">Select Recommendation for Payment
                            Features</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Left Section-->
                    <form action="" enctype="multipart/form-data" id="update_payment_applicant">
                        @csrf
                        <input type="hidden" value="{{ $data->id }}" name="id">
                        <input type="hidden" value="{{ $data->merchant->token_applicant }}" name="token">
                        <div class="d-flex align-self-center">
                            <div class="flex-grow-1 me-3">
                                <!--begin::Select-->
                                <select name="status_approval" class="form-select form-select-solid"
                                    data-control="select2" data-placeholder="Recommendation" data-hide-search="true"
                                    {{ !$userApproval ? '' : 'disabled' }}>
                                    <option value="{{ !$userApproval ? '' : $userApproval->status }}">
                                        {{ !$userApproval ? '' : $userApproval->status }}</option>
                                    @if (Auth::user()->role_id == 4)
                                        <option value="Validation">Validation</option>
                                        <option value="Reject">Reject</option>
                                        <option value="Close">Close</option>
                                    @elseif (Auth::user()->role_id == 5)
                                        <option value="Approve">Approve</option>
                                        <option value="Reject">Reject</option>
                                        <option value="Close">Close</option>
                                    @else
                                        <option value="Verification">Verification</option>
                                        <option value="Reject">Reject</option>
                                        <option value="Close">Close</option>
                                    @endif
                                </select>
                                <!--end::Select-->
                            </div>
                        </div>
                        <textarea name="notes_approval" class="form-control form-control-flush mb-3 mt-3 border" rows="3"
                            placeholder="Type a notes" {{ !$userApproval ? '' : 'disabled' }}>{{ !$userApproval ? '' : $userApproval->notes }}</textarea>
                        <div class="d-flex justify-content-end pt-7">
                            @if (Auth::user()->role_id == 2 && $data->layer_id == 2)
                                <button type="submit" class="btn btn-sm fw-bolder btn-primary">Save
                                    Changes</button>
                            @elseif (Auth::user()->role_id == 4 && $data->layer_id == 4)
                                <button type="submit" class="btn btn-sm fw-bolder btn-primary">Save
                                    Changes</button>
                            @elseif (Auth::user()->role_id == 5 && $data->layer_id == 3)
                                <button type="submit" class="btn btn-sm fw-bolder btn-primary">Save
                                    Changes</button>
                            @endif
                        </div>
                    </form>
                    <!--end::Left Section-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Tables Widget 5-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-5">
            <!--begin::List Widget 5-->
            <div class="card card-xl-stretch mb-xl-10">
                <!--begin::Header-->
                <div class="card-header align-items-center border-0 mt-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fw-bolder mb-2 text-dark">History Approval</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <!--begin::uTimeline-->
                    @if (count($historyApproval))
                        <div class="timeline-label">
                            @foreach ($historyApproval as $item)
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bolder text-gray-800 fs-5">
                                        {{ $item->created_at->format('H:i') }} <br>
                                        {{ $item->created_at->format('d M Y') }}</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="fa fa-genderless text-primary fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <div class="flex-grow-1 ms-2">
                                        <a href="#"
                                            class="fw-bolder text-gray-800 text-hover-primary fs-6">{{ $item->status }}</a>
                                        <span class="text-muted fw-bold d-block">{{ $item->notes }}</span>
                                        <span
                                            class="text-muted fw-bold d-block">{{ App\Helpers\Utils::getUserName($item->user_id) . '( ' . App\Helpers\Utils::getUserRole($item->user_id) . ' )' }}</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Item-->
                            @endforeach
                        </div>
                    @else
                        <span class="fw-bolder fs-4 mb-2 text-muted">History is empty</span>
                    @endif
                    <!--end::Timeline-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end: List Widget 5-->
        </div>
        <!--end::Col-->
    </div>

    <!--end::Navbar-->
    @section('scripts')
        <script src="{{ asset('tadmin/js/custom/applicant/payments/custom.js') }}"></script>
    @endsection
</x-app-layout>
