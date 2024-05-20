@if (count($payments) < 1)
    <div class="card-title fs-4 fw-bolder text-center">Data not found.</div>
@else
    <div class="row gx-xl-10">
        <!--begin::Col-->
        <div class="col-xl-7">
            <!--begin::Tables Widget 5-->
            <div class="card mb-xl-10 p-5">
                <!--begin::Row-->
                <div class="card-title fs-4 fw-bolder pt-5 px-3">Merchant's Payment Features</div>
                <div class="separator my-2"></div>

                <form action="" enctype="multipart/form-data" id="bulk_update_payment_applicant" class=" px-3">
                    @csrf
                    <input type="hidden" value="{{ $data->token_applicant }}" name="token">

                    @foreach ($payments as $pay)
                        @if ($pay->layer_id == App\Helpers\Utils::getLayerIdByRole(Auth::user()->role_id))
                            <input type="hidden" value="{{ $pay->id }}" name="id[]">
                            <div class="d-flex align-self-center mb-4">
                                <div class="flex-grow-1 me-3">
                                    <div class="card-title fs-5 fw-bold pt-3">{{ $pay->payment }}</div>
                                    <!--begin::Select-->
                                    <select name="status_approval[]" class="form-select form-select-solid"
                                        data-control="select2" data-placeholder="Recommendation"
                                        data-hide-search="true">
                                        <option value=""></option>
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
                            <textarea name="notes_approval[]" class="form-control form-control-flush mb-3 mt-3 border" rows="3"
                                placeholder="Type a notes"></textarea>
                            <div class="separator my-2"></div>
                        @else
                            <div class="d-flex align-self-center mb-4">
                                <div class="flex-grow-1 me-3">
                                    <div class="card-title fs-5 fw-bold pt-3">{{ $pay->payment }}</div>
                                    <!--begin::Select-->
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Recommendation" data-hide-search="true" disabled>
                                        <option value="{{ $pay->status_approval }}">{{ $pay->internal_status }}</option>
                                    </select>
                                    <!--end::Select-->
                                </div>
                            </div>
                            <textarea class="form-control form-control-flush mb-3 mt-3 border" rows="3" disabled>{{ $pay->notes }}</textarea>
                            <div class="separator my-2"></div>
                        @endif
                    @endforeach
                    <div class="d-flex justify-content-end pt-7">
                        <button type="submit" class="btn btn-sm fw-bolder btn-primary">Save
                            Changes</button>
                    </div>
                </form>
                {{-- @if (count($paymentApproval) > 0)
                    <form action="" enctype="multipart/form-data" id="bulk_update_payment_applicant" class=" px-3">
                        @csrf

                        @foreach ($payments as $pay)
                            <div class="d-flex align-self-center mb-1">
                                <div class="flex-grow-1 me-3">
                                    <div class="card-title fs-5 fw-bold pt-3">
                                        {{ $pay->payment }}
                                    </div>
                                    <span
                                        class="badge badge-lg badge-light-{{ App\Helpers\Utils::badgeApplicant($pay->internal_status) }}">{{ $pay->internal_status }}</span>
                                </div>
                            </div>
                            <a href="{{ url('/applicants/payments/show/' . $pay->id . '/' . $pay->merchant->token_applicant) }}"
                                class=" btn btn-sm btn-primary mb-2">View Detail</a>
                            <div class="separator my-2"></div>
                        @endforeach
                        <div class="d-flex justify-content-end pt-7">
                            @if (Auth::user()->role_id == 2 && $pay->layer_id == 2)
                                <button type="submit" class="btn btn-sm fw-bolder btn-primary">Save
                                    Changes</button>
                            @elseif (Auth::user()->role_id == 4 && $pay->layer_id == 4)
                                <button type="submit" class="btn btn-sm fw-bolder btn-primary">Save
                                    Changes</button>
                            @elseif (Auth::user()->role_id == 5 && $pay->layer_id == 3)
                                <button type="submit" class="btn btn-sm fw-bolder btn-primary">Save
                                    Changes</button>
                            @endif
                        </div>
                    </form>
                @else
                    <form action="" enctype="multipart/form-data" id="bulk_update_payment_applicant"
                        class=" px-3">
                        @csrf
                        <input type="hidden" value="{{ $data->token_applicant }}" name="token">

                        @foreach ($payments as $pay)
                            @if ($pay->layer_id == App\Helpers\Utils::getLayerIdByRole(Auth::user()->role_id))
                                <input type="hidden" value="{{ $pay->id }}" name="id[]">
                                <div class="d-flex align-self-center mb-4">
                                    <div class="flex-grow-1 me-3">
                                        <div class="card-title fs-5 fw-bold pt-3">{{ $pay->payment }}</div>
                                        <!--begin::Select-->
                                        <select name="status_approval[]" class="form-select form-select-solid"
                                            data-control="select2" data-placeholder="Recommendation"
                                            data-hide-search="true">
                                            <option value=""></option>
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
                                <textarea name="notes_approval[]" class="form-control form-control-flush mb-3 mt-3 border" rows="3"
                                    placeholder="Type a notes"></textarea>
                                <div class="separator my-2"></div>
                            @else
                                <div class="d-flex align-self-center mb-4">
                                    <div class="flex-grow-1 me-3">
                                        <div class="card-title fs-5 fw-bold pt-3">{{ $pay->payment }}</div>
                                        <!--begin::Select-->
                                        <select class="form-select form-select-solid"
                                            data-control="select2" data-placeholder="Recommendation"
                                            data-hide-search="true" disabled>
                                            <option value="">{{ $pay->payment }}</option>
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                </div>
                                <textarea class="form-control form-control-flush mb-3 mt-3 border" rows="3"
                                    placeholder="Type a notes"></textarea>
                                <div class="separator my-2"></div>
                            @endif
                        @endforeach
                        <div class="d-flex justify-content-end pt-7">
                            @if (Auth::user()->role_id == 2 && $pay->layer_id == 2)
                                <button type="submit" class="btn btn-sm fw-bolder btn-primary">Save
                                    Changes</button>
                            @elseif (Auth::user()->role_id == 4 && $pay->layer_id == 4)
                                <button type="submit" class="btn btn-sm fw-bolder btn-primary">Save
                                    Changes</button>
                            @elseif (Auth::user()->role_id == 5 && $pay->layer_id == 3)
                                <button type="submit" class="btn btn-sm fw-bolder btn-primary">Save
                                    Changes</button>
                            @endif
                        </div>
                    </form>
                @endif --}}
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
                    @if (count($paymentApproval))
                        <div class="timeline-label">
                            @foreach ($paymentApproval as $item)
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
                                        <span class="text-muted fw-bolder d-block">{{ $item->payment->payment }}</span>
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
@endif
