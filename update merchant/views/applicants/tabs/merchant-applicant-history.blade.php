<div class="row gx-xl-10">
    <div class="col-xl-10">
        <!--begin::List Widget 5-->
        <div class="card card-xl-stretch mb-xl-10">
            <!--begin::Header-->
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder mb-2 text-dark">History Merchant Approval</span>
                </h3>
            </div>
            <!--end::Header-->
            
            <!--begin::Body-->
            <div class="card-body pt-5">
                <!--begin::uTimeline-->
                @if (count($approvals) > 0)
                    <div class="timeline-label">
                        @foreach ($approvals as $item)
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
</div>
