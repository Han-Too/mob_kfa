@if (count($documents) < 1)
    <div class="card-title fs-4 fw-bolder text-center">Data not found.</div>
@else
    <div class="row gx-xl-10">
        <!--begin::Col-->
        <div class="col-xl-7">
            <!--begin::Tables Widget 5-->
            <div class="card mb-xl-10 p-5">
                <!--begin::Row-->
                <div class="card-title fs-4 fw-bolder pt-5 px-5">Proof Of Payment</div>
                <div class="separator my-2"></div>
                <form action="" class="form row card-body p-5" id="update_document_applicant"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="token" value="{{ $data->token_applicant }}">
                    @if (count($proofs) > 0)
                        @foreach ($proofs as $doc)
                            <div class="row mb-4 py-2">
                                <!--begin::Col-->
                                <div class="col-xl-12">
                                    <div class="fs-6 fw-bold mt-2 mb-3">- {{ $doc->description }}</div>
                                    <div class="d-flex flex-column">
                                        <div class="symbol symbol-150px symbol-2by3 me-4 cursor-pointer" data-bs-toggle="modal" data-bs-target="#kt_modal_show_proof"
                                        onclick="handleProofClick('{{ $doc->url }}', '{{ $doc->description }}')">
                                            <div class="symbol-label"
                                                style="background-image: url({{ $doc->url }})">
                                            </div>
                                        </div>
                                        {{-- <div class="symbol symbol-150px symbol-2by3 cursor-pointer"
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_view_users"
                                            onclick="handleImageClick('{{ $doc->url }}', 'Bukti Pembayaran')">
                                            <div class="symbol-label"
                                                style="background-image: url({{ $doc->url }})">
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                        @endforeach
                    @else
                        <span class="fw-bolder fs-4 mb-2 text-muted">Proof of Payment is Empty</span>

                    @endif
                </form>
            </div>
            <!--end::Tables Widget 5-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        {{-- <div class="col-xl-5">
            <!--begin::List Widget 5-->
            <div class="card card-xl-stretch mb-xl-10">
                <!--begin::Header-->
                <div class="card-header align-items-center border-0 mt-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fw-bolder mb-2 text-dark">History Approval Merchant</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <!--begin::uTimeline-->
                    @if (count($historyApprovalDesc))
                        <div class="timeline-label">
                            @foreach ($historyApprovalDesc as $item)
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
        </div> --}}
        <!--end::Col-->
    </div>

    <div class="modal fade" id="kt_modal_show_proof" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-800px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body mx-2 mx-xl-18 pt-0 pb-15">
                    <!--begin::Heading-->
                    <div class="text-center mb-13">
                        <!--begin::Title-->
                        <h1 class="mb-3">Bukti Pembayaran</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Users-->
                    <div class="mb-10  text-center">
                        <!--begin::List-->
                        <div class="mh-375px me-n7 pe-7  text-center">

                            <a download="bukti-pembayaran.jpg" href="" title="Bukti Pembayara" id="linkDownload">
                                <img src="" alt="" id="modalProofImage"
                                class="mh-400px mw-600px text-center">
                                <h6 class="my-3" id="proofDesc"></h6>
                            </a>
                        </div>
                        <!--end::List-->
                    </div>
                    <!--end::Users-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
@endif


<script>
    function handleProofClick(imageUrl, desc) {
        var modalImage = document.getElementById('modalProofImage');
        modalImage.src = imageUrl;
        var modalDesc = document.getElementById('proofDesc');
        modalDesc.innerHTML = desc;
        var linkDownload = document.getElementById('linkDownload');
        linkDownload.href = imageUrl;
        $('#kt_modal_show_proof').modal('show');
    }
</script>
