{{-- @php
    
var_dump($data->workflow->layer_id == App\Helpers\Utils::getLayerIdByRole(Auth::user()->role_id));
die();
@endphp --}}

@if (count($documents) < 1)
    <div class="card-title fs-4 fw-bolder text-center">Data not found.</div>
@else
    <div class="row gx-xl-10">
        <!--begin::Col-->
        <div class="col-xl-7">
            <!--begin::Tables Widget 5-->
            <div class="card mb-xl-10 p-5">
                <!--begin::Row-->
                <div class="card-title fs-4 fw-bolder pt-5 px-5">Document Merchant</div>
                <div class="separator my-2"></div>
                <form action="" class="form row card-body p-5" id="update_document_applicant"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="token" value="{{ $data->token_applicant }}">
                    @if (Auth::user()->role_id == 5 || Auth::user()->role_id == 7)
                        @foreach ($documents as $doc)
                            <div class="row mb-4 py-2">
                                <!--begin::Col-->
                                <div class="col-xl-4">
                                    <div class="d-flex flex-column">
                                        @if ($doc->type == 'pdf')
                                            {{-- @if (substr($url, -3) == 'pdf') --}}
                                            <a download="{{ $doc->document->title }}.pdf" href="{{ $doc->image }}"
                                                title="{{ $doc->document->title }}" id="linkDownload">
                                                <div class="symbol symbol-100px symbol-2by3 cursor-pointer">
                                                    <div class="symbol-label"
                                                        style="background-image: url({{ asset('tadmin/media/download-pdf.jpg') }})">
                                                    </div>
                                                </div>
                                            </a>
                                        @else
                                            <div class="symbol symbol-100px symbol-2by3 cursor-pointer"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_view_users"
                                                onclick="handleImageClick('{{ $doc->image }}', 'Dokumen {{ $doc->document->title }}')">
                                                <div class="symbol-label"
                                                    style="background-image: url({{ $doc->image }})"></div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-8 fv-row ">
                                    <div class="fs-6 fw-bold mt-2 mb-3">{{ $doc->document->title }}
                                    </div>
                                    <select aria-label="Select Approval"
                                        class="form-select form-select-sm form-select-solid" disabled>
                                        <option value="{{ $doc->status_approval }}">{{ $doc->status_approval }}
                                        </option>
                                    </select>
                                    <textarea class="form-control border border-primary form-control-flush mb-3" rows="1" disabled>{{ $doc->notes }}</textarea>
                                </div>
                            </div>
                        @endforeach
                        
                            <div class="row mb-4 py-2 d-flex justify-content-start align-items-center">
                                <!--begin::Col-->
                                <div class="col-xl-4">
                                    <div class="d-flex flex-column">
                                        <div class="symbol symbol-100px symbol-2by3 cursor-pointer"
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_view_signature">
                                            <div class="symbol-label"
                                                style="background-image: url({{ $sign->image }})">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 fv-row">
                                    <div class="fs-6 fw-bold mt-2 mb-3">
                                        Merchant Signature
                                    </div>
                                    <select name="statusSign" aria-label="Select Approval"
                                        class="form-select form-select-sm form-select-solid documentSelect"
                                        id="signSelect" onchange="clearSignNotes({{ $sign->id }})" disabled>
                                        <option value="{{ $sign->status_approval }}">
                                            {{ $sign->status_approval }}
                                        </option>
                                    </select>
                                    <textarea name="notesSign" class="form-control border border-primary form-control-flush mb-3" rows="1"
                                        placeholder="Type a notes" id="notesSignSelect">{{ $sign->notes }}</textarea>
                                </div>
                                <!--end::Col-->
                            </div>
                        @if ($data->workflow->layer_id == App\Helpers\Utils::getLayerIdByRole(Auth::user()->role_id))

                            <div class="col-xl-12 fv-row">
                                <div class="fs-3 fw-bolder mt-2 mb-3 text-center">Summary Process</div>
                                <select onchange="showAdditionalSelect()" id="approvalStatus" name="status_approval"
                                    aria-label="Select Recomendation" data-control="select2"
                                    class="form-select form-select-sm form-select-solid">
                                    <option value="">-- Select Recomendation --</option>
                                    <option value="Approve">Approve by Bank</option>
                                    {{-- <option value="Reject">Reject</option> --}}
                                    <option value="Close">Close</option>
                                </select>
                                <input style="display: none" id="settingTid" type="text" name="status_setting_tid"
                                    class="form-control form-control-solid mt-3" placeholder="TID" autocomplete="off" />
                                <input style="display: none" id="settingMid" type="text" name="status_setting_mid"
                                    class="form-control form-control-solid mt-3" placeholder="MID" autocomplete="off" />
                                <textarea name="notes_approval" class="form-control border border-primary form-control-flush mb-3" rows="1"
                                    placeholder="Type a notes"></textarea>
                            </div>
                            <div class="d-flex justify-content-end pt-7">
                                <button type="submit" class="btn btn-sm fw-bolder btn-primary">Save
                                    Changes</button>
                            </div>
                        @else
                            @if ($merchantApproval)
                                <div class="col-xl-12 fv-row">
                                    <div class="fs-3 fw-bolder mt-2 mb-3 text-center">Summary Process</div>
                                    <select name="status_approval" aria-label="Select Recomendation"
                                        data-control="select2" class="form-select form-select-sm form-select-solid"
                                        disabled>
                                        <option value="{{ $merchantApproval->status }}">
                                            {{ $merchantApproval->status == 'Approve' ? 'Approved by Bank' : $merchantApproval->status }}
                                        </option>
                                    </select>
                                    <textarea name="notes_approval" disabled class="form-control border border-primary form-control-flush mb-3"
                                        rows="1" placeholder="Type a notes">{{ $merchantApproval->notes }}</textarea>
                                </div>
                            @endif
                        @endif
                    @else
                        @if (Auth::user()->role_id == 1 ||
                                Auth::user()->role_id == 7 ||
                                $data->workflow->layer_id == App\Helpers\Utils::getLayerIdByRole(Auth::user()->role_id))
                            <div class="row mb-4 py-2">
                                <!--begin::Col-->
                                <div class="col-xl-12 fv-row">
                                    <div class="fs-6 fw-bold mb-3">Bulk Update</div>
                                    <div class="d-flex justify-content-start">
                                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 7)
                                            <button type="button"
                                                onclick="bulkDocument('Verification', 'Document has been verified')"
                                                class="btn btn-sm fw-bolder btn-primary mx-1">Verification</button>
                                            <button type="button"
                                                onclick="bulkDocument('Validation', 'Document has been validated')"
                                                class="btn btn-sm fw-bolder btn-primary mx-1">Validation</button>
                                        @else
                                            @if ($data->workflow->layer_id == 2)
                                                <button type="button"
                                                    onclick="bulkDocument('Verification', 'Document has been verified')"
                                                    class="btn btn-sm fw-bolder btn-primary mx-1">Verification</button>
                                            @elseif($data->workflow->layer_id == 4)
                                                <button type="button"
                                                    onclick="bulkDocument('Validation', 'Document has been validated')"
                                                    class="btn btn-sm fw-bolder btn-primary mx-1">Validation</button>
                                            @endif
                                        @endif
                                        <button type="button"
                                            onclick="bulkDocument('Reject', 'Document has been rejected')"
                                            class="btn btn-sm fw-bolder btn-warning mx-1">Reject</button>
                                        {{-- ///////////////////////////////////////// --}}
                                        {{-- <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_view_signature"
                                            class="btn btn-sm fw-bolder btn-success mx-1">Show Signature</button> --}}

                                        <input type="hidden" id="userId" value="{{ $tokenApp }}">
                                        {{-- <button type="button" id="downloadKabeh"
                                            class="btn btn-sm fw-bolder btn-info mx-1">Download
                                            All</button> --}}

                                        <script>
                                            document.getElementById('downloadKabeh').addEventListener('click', async function() {
                                                const userId = document.getElementById('userId').value;
                                                console.log(userId);

                                                if (!userId) {
                                                    alert('Please enter a User ID');
                                                    return;
                                                }

                                                try {
                                                    // Ambil link file dari server berdasarkan ID
                                                    // const response = await fetch(`http://127.0.0.1:8000/downloadKabeh/${userId}`);
                                                    const myHeaders = new Headers();
                                                    myHeaders.append("C-API-KEY", "C56c5f91b-Ae3fb-S42a3-H87c0-L39d7a8f3cd36EZ");

                                                    const requestOptions = {
                                                        method: "GET",
                                                        headers: myHeaders,
                                                        redirect: "follow"
                                                    };

                                                    // const response = fetch("http://127.0.0.1:8000/api/getDoc/" + userId, requestOptions);
                                                    // if (!response.ok) throw new Error('Network response was not ok');

                                                    fetch("http://127.0.0.1:8000/api/getDoc/" + userId, requestOptions)
                                                        .then(res => res.json())
                                                        .then(data => {
                                                            obj = data;
                                                        })
                                                        .then(() => {
                                                            // console.log(obj);
                                                            const files = obj.data;
                                                            const arrayLen = Object.getOwnPropertyNames(obj.data).length;
                                                            // console.log(files);

                                                            for (const file of files) {
                                                                try {
                                                                    var filesForDownload = [];

                                                                    // foreach (obj.data as data){
                                                                    for (var i = 0; i < arrayLen; i++) {
                                                                        filesForDownload({
                                                                            path: obj.data[i],
                                                                            name: obj.data[i].replace(`https://mob.cashlez.com/images/`,
                                                                                '')
                                                                        });
                                                                    }

                                                                    document.getElementById('downloadKabeh').addEventListener('click', function(
                                                                        e) {
                                                                        e.preventDefault();

                                                                        var temporaryDownloadLink = document.createElement("a");
                                                                        temporaryDownloadLink.style.display = 'none';

                                                                        document.body.appendChild(temporaryDownloadLink);

                                                                        for (var n = 0; n < filesForDownload.length; n++) {
                                                                            var download = filesForDownload[n];
                                                                            temporaryDownloadLink.setAttribute('href', download.path);
                                                                            temporaryDownloadLink.setAttribute('download', download
                                                                                .name);

                                                                            temporaryDownloadLink.click();
                                                                        }

                                                                        document.body.removeChild(temporaryDownloadLink);
                                                                    });
                                                                } catch (error) {
                                                                    console.error('Error downloading file:', filePath, error);
                                                                }
                                                            }
                                                        });


                                                } catch (error) {
                                                    console.error('Error fetching file links:', error);
                                                }
                                            });
                                        </script>
                                        {{-- ///////////////////////////////////////////////////// --}}
                                    </div>
                                </div>
                            </div>

                            @foreach ($documents as $doc)
                                <input type="hidden" name="id[]" value="{{ $doc->id }}">
                                <div class="row mb-4 py-2">
                                    <!--begin::Col-->
                                    <div class="col-xl-4">
                                        {{-- <div class="d-flex flex-column">
                                            <div class="symbol symbol-100px symbol-2by3 cursor-pointer"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_view_users"
                                                onclick="handleImageClick('{{ $doc->image }}', 'Dokumen {{ $doc->document->title }}')">
                                                <div class="symbol-label"
                                                    style="background-image: url({{ $doc->image }})"></div>
                                            </div>
                                        </div> --}}
                                        <div class="d-flex flex-column">
                                            @if ($doc->type == 'pdf')
                                                {{-- @if (substr($url, -3) == 'pdf') --}}
                                                <a download="{{ $doc->document->title }}.pdf"
                                                    href="{{ $doc->image }}" title="{{ $doc->document->title }}"
                                                    id="linkDownload">
                                                    <div class="symbol symbol-100px symbol-2by3 cursor-pointer">
                                                        <div class="symbol-label"
                                                            style="background-image: url({{ asset('tadmin/media/download-pdf.jpg') }})">
                                                        </div>
                                                    </div>
                                                </a>
                                            @else
                                                <div class="symbol symbol-100px symbol-2by3 cursor-pointer"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_view_users"
                                                    onclick="handleImageClick('{{ $doc->image }}', 'Dokumen {{ $doc->document->title }}')">
                                                    <div class="symbol-label"
                                                        style="background-image: url({{ $doc->image }})"></div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-8 fv-row">
                                        <div class="fs-6 fw-bold mt-2 mb-3">{{ $doc->document->title }}</div>
                                        <select name="status[]" aria-label="Select Approval"
                                            class="form-select form-select-sm form-select-solid documentSelect"
                                            id="statusSelect_{{ $doc->id }}"
                                            onchange="clearNotes({{ $doc->id }})">
                                            <option value="{{ $doc->status_approval }}">
                                                {{ $doc->status_approval ? $doc->status_approval : '-- Select Approval --' }}
                                            </option>
                                            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 7)
                                                <option value="Verification">Verification</option>
                                                <option value="Validation">Validation</option>
                                                <option value="Reject">Reject</option>
                                            @else
                                                @if (App\Helpers\Utils::getLayerIdByRole(Auth::user()->role_id) == 2)
                                                    <option value="Verification">Verification
                                                    </option>
                                                    <option value="Reject">Reject</option>
                                                @else
                                                    <option value="Validation">Validation</option>
                                                    <option value="Reject">Reject</option>
                                                @endif
                                            @endif
                                        </select>
                                        <textarea name="notes[]" class="form-control border border-primary form-control-flush mb-3" rows="1"
                                            placeholder="Type a notes" id="notesSelect_{{ $doc->id }}">{{ $doc->notes }}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @foreach ($documents as $doc)
                                <div class="row mb-4 py-2">
                                    <!--begin::Col-->
                                    <div class="col-xl-4">
                                        <div class="d-flex flex-column">
                                            @if ($doc->type == 'pdf')
                                                {{-- @if (substr($url, -3) == 'pdf') --}}
                                                <a download="{{ $doc->document->title }}.pdf"
                                                    href="{{ $doc->image }}" title="{{ $doc->document->title }}"
                                                    id="linkDownload">
                                                    <div class="symbol symbol-100px symbol-2by3 cursor-pointer">
                                                        <div class="symbol-label"
                                                            style="background-image: url({{ asset('tadmin/media/download-pdf.jpg') }})">
                                                        </div>
                                                    </div>
                                                </a>
                                            @else
                                                <div class="symbol symbol-100px symbol-2by3 cursor-pointer"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_view_users"
                                                    onclick="handleImageClick('{{ $doc->image }}', 'Dokumen {{ $doc->document->title }}')">
                                                    <div class="symbol-label"
                                                        style="background-image: url({{ $doc->image }})"></div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-8 fv-row">
                                        <div class="fs-6 fw-bold mt-2 mb-3">
                                            {{ App\Helpers\Utils::getDocumentTitle($doc->document_id) }}
                                        </div>
                                        <select name="status[]" aria-label="Select Approval" disabled
                                            class="form-select form-select-sm form-select-solid">
                                            <option value="{{ $doc->status_approval }}">{{ $doc->status_approval }}
                                            </option>
                                            @if (App\Helpers\Utils::getLayerIdByRole(Auth::user()->role_id) == 2)
                                                <option value="Verification">Verification</option>
                                                <option value="Reject">Reject</option>
                                            @else
                                                <option value="Validation">Validation</option>
                                                <option value="Reject">Reject</option>
                                            @endif
                                        </select>
                                        <textarea name="notes[]" disabled class="form-control border border-primary form-control-flush mb-3" rows="1"
                                            placeholder="Type a notes">{{ $doc->notes }}</textarea>
                                    </div>
                                </div>
                            @endforeach

                        @endif

                        <div class="row mb-4 py-2 d-flex justify-content-start align-items-center">
                            <!--begin::Col-->
                            <div class="col-xl-4">
                                <div class="d-flex flex-column">
                                    <div class="symbol symbol-100px symbol-2by3 cursor-pointer" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_view_signature">
                                        <div class="symbol-label" style="background-image: url({{ $sign->image }})">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 fv-row">
                                <div class="fs-6 fw-bold mt-2 mb-3">
                                    Merchant Signature
                                </div>
                                <select name="statusSign" aria-label="Select Approval"
                                    class="form-select form-select-sm form-select-solid documentSelect"
                                    id="signSelect" onchange="clearSignNotes({{ $sign->id }})">
                                    <option value="{{ $sign->status_approval }}">
                                        {{ $sign->status_approval ? $sign->status_approval : '-- Select Approval --' }}
                                    </option>
                                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 7)
                                        <option value="Verification">Verification</option>
                                        <option value="Validation">Validation</option>
                                        <option value="Reject">Reject</option>
                                    @else
                                        @if (App\Helpers\Utils::getLayerIdByRole(Auth::user()->role_id) == 2)
                                            <option value="Verification">Verification
                                            </option>
                                            <option value="Reject">Reject</option>
                                        @else
                                            <option value="Validation">Validation</option>
                                            <option value="Reject">Reject</option>
                                        @endif
                                    @endif
                                </select>
                                <textarea name="notesSign" class="form-control border border-primary form-control-flush mb-3" rows="1"
                                    placeholder="Type a notes" id="notesSignSelect">{{ $sign->notes }}</textarea>
                            </div>
                            <!--end::Col-->
                        </div>

                        {{-- Summary Process --}}
                        @if (Auth::user()->role_id == 1 ||
                                Auth::user()->role_id == 7 ||
                                $data->workflow->layer_id == App\Helpers\Utils::getLayerIdByRole(Auth::user()->role_id))

                            <div class="col-xl-12 fv-row" id="summaryProcess">
                                <div class="fs-3 fw-bolder mt-2 mb-3 text-center">Summary Process</div>
                                <select onchange="showAdditionalSelect()" id="approvalStatus" name="status_approval"
                                    aria-label="Select Recomendation" data-control="select2"
                                    class="form-select form-select-sm form-select-solid">
                                    <option value="">-- Select Recomendation --</option>
                                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 7)
                                        <option value="Verification" class="hideReject">Verification</option>
                                        <option value="Validation" class="hideReject">Validation</option>
                                        <option value="Approve" class="hideReject">Approve by Bank</option>
                                        <option value="Reject">Reject</option>
                                        <option value="Close">Close</option>
                                    @else
                                        @if (Auth::user()->role_id == 4)
                                            <option value="Validation" class="hideReject">Validation</option>
                                            <option value="Reject">Reject</option>
                                            <option value="Close">Close</option>
                                        @elseif (Auth::user()->role_id == 5)
                                            <option value="Approve" class="hideReject">Approve by Bank</option>
                                            <option value="Reject">Reject</option>
                                            <option value="Close">Close</option>
                                        @else
                                            <option value="Verification" class="hideReject">Verification</option>
                                            <option value="Reject">Reject</option>
                                            <option value="Close">Close</option>
                                        @endif
                                    @endif
                                </select>
                                <input style="display: none" id="settingTid" type="text"
                                    name="status_setting_tid" class="form-control form-control-solid mt-3"
                                    placeholder="TID" autocomplete="off" />
                                <input style="display: none" id="settingMid" type="text"
                                    name="status_setting_mid" class="form-control form-control-solid mt-3"
                                    placeholder="MID" autocomplete="off" />
                                <div style="display: none" class="select_reason" id="additionalSelect">
                                    <select id="reason" name="reason" aria-label="Pilih Alasan"
                                        data-control="select2"
                                        class="form-select form-select-sm form-select-solid mt-2">
                                        <option value="">-- Pilih Alasan --</option>
                                        @foreach ($reason as $item)
                                            <option value="{{ $item->title }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <textarea name="notes_approval" class="form-control border border-primary form-control-flush mb-3" rows="1"
                                    placeholder="Type a notes"></textarea>
                            </div>

                            <div class="d-flex justify-content-end pt-7">
                                <button type="submit" class="btn btn-sm fw-bolder btn-primary">Save
                                    Changes</button>
                            </div>
                        @else
                            @if ($merchantApproval)
                                <div class="col-xl-12 fv-row">
                                    <div class="fs-3 fw-bolder mt-2 mb-3 text-center">Summary Process</div>
                                    <select name="status_approval" aria-label="Select Recomendation"
                                        data-control="select2" class="form-select form-select-sm form-select-solid"
                                        disabled>
                                        <option value="{{ $merchantApproval->status }}">
                                            {{ $merchantApproval->status }}
                                        </option>
                                    </select>
                                    <textarea name="notes_approval" disabled class="form-control border border-primary form-control-flush mb-3"
                                        rows="1" placeholder="Type a notes">{{ $merchantApproval->notes }}</textarea>
                                </div>
                            @endif
                        @endif
                    @endif
                </form>
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
                    @if (count($allDocHis))
                        <div class="timeline-label">
                            @foreach ($allDocHis as $item)
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

                                        @if (substr($item->approval_id, 0, 3) == '000')
                                            <span class="text-muted fw-bolder d-block">
                                                Merchant Signature
                                            </span>
                                        @else
                                            <span class="text-muted fw-bolder d-block">
                                                {{ $item->document ? App\Helpers\Utils::getDocumentTitle($item->document->document_id) : '' }}
                                            </span>
                                        @endif
                                        <span class="text-muted fw-bold d-block">{{ $item->notes }}</span>
                                        <span class="text-muted fw-bold d-block">
                                            @if (Auth::user()->role_id == 7)
                                                {{ App\Helpers\Utils::getUserName($item->user_id) . '( Dewa )' }}
                                        </span>
                                    @else
                                        {{ App\Helpers\Utils::getUserName($item->user_id) . '( ' . App\Helpers\Utils::getUserRole($item->user_id) . ' )' }}</span>
                            @endif
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

<!--begin::Modal - View Users-->
<div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-800px modal-dialog-centered">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
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
                    <h1 class="mb-3" id="docTitle"></h1>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Users-->
                <div class="mb-10  text-center">
                    <!--begin::List-->
                    <div class="mh-375px me-n7 pe-7  text-center">
                        <a download="dokumen.jpg" href="" title="Dokumen" id="linkDownloadDocument">
                            <img src="" alt="" id="modalImage"
                                class="mh-400px mw-600px text-center">
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
<div class="modal fade" id="kt_modal_view_signature" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-800px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
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
                    <h1 class="mb-3">Merchant Signature</h1>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Users-->
                <div class="mb-10  text-center">
                    <!--begin::List-->
                    <div class="mh-375px me-n7 pe-7  text-center">
                        <a download="dokumen.jpg" href="" title="Dokumen" id="linkDownloadDocument">
                            <img src="{{ $sign->image }}" alt="" id="modalImage"
                                class="mh-400px mw-600px text-center">
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
<!--end::Modal - View Users-->
@endif

<script>
    var layer_id = {{ $data->workflow->layer_id }}
    var isReject = false

    function showAdditionalSelect() {
        var approvalStatus = document.getElementById("approvalStatus");
        var additionalSelect = document.getElementById("additionalSelect");

        console.log(layer_id);
        if (layer_id == 3) {
            var tidInput = document.getElementById("settingTid");
            var midInput = document.getElementById("settingMid");
        }

        var reason = document.getElementById("reason");

        if (approvalStatus.value === "Reject") {
            // alert(approvalStatus.value);
            additionalSelect.style.display = "block";
            if (layer_id == 3) {
                tidInput.style.display = "none";
                midInput.style.display = "none";
                tidInput.value = null
                midInput.value = null
            }
        } else if (approvalStatus.value === "Approve") {
            if (layer_id == 3) {
                tidInput.style.display = "block";
                midInput.style.display = "block";
            }
        } else {
            additionalSelect.style.display = "none";
            reason.value = '';
            if (layer_id == 3) {
                tidInput.style.display = "none";
                midInput.style.display = "none";
                tidInput.value = null
                midInput.value = null
            }
            additionalSelect.value = null
        }
    }

    function bulkDocument(value, notes) {

        var approvalStatus = document.getElementById("approvalStatus");
        var additionalSelect = document.getElementById("additionalSelect");
        var containerStatus = document.getElementById("select2-approvalStatus-container");
        var reason = document.getElementById("reason");

        if (value == "Reject") {
            containerStatus.innerHTML = 'Reject'
            approvalStatus.value = 'Reject'
            additionalSelect.style.display = "block";
        } else if (value == "Verification") {
            containerStatus.innerHTML = 'Verification'
            approvalStatus.value = 'Verification'
            additionalSelect.style.display = "none"
            reason.value = '';
        } else if (value == "Validation") {
            containerStatus.innerHTML = 'Validation'
            approvalStatus.value = 'Validation'
            additionalSelect.style.display = "none"
            reason.value = '';
        } else {
            containerStatus.innerHTML = '-- Select Recomendation --'
            approvalStatus.value = null
            additionalSelect.style.display = "none"
            reason.value = '';
        }

        @foreach ($documents as $doc)
            var selectElement = document.getElementById("statusSelect_{{ $doc->id }}");
            selectElement.value = value;
            var notesElement = document.getElementById("notesSelect_{{ $doc->id }}");
            notesElement.value = notes
        @endforeach

        var SignElement = document.getElementById("signSelect");
        SignElement.value = value;
        var notesSignElement = document.getElementById("notesSignSelect");
        notesSignElement.value = notes
        // console.log(SignElement);
        // console.log(notesSignElement);

        $('html, body').animate({
            scrollTop: $("#summaryProcess").offset().top
        }, 800);
    }

    function clearNotes(value) {
        var hideRejectOptions = document.querySelectorAll('option.hideReject');
        var checkAllSelect = document.querySelectorAll('select.documentSelect');
        var hasReject = false;

        checkAllSelect.forEach(function(select) {
            if (select.value == 'Reject') {
                hasReject = true;
            }
        });

        checkAllSelect.forEach(function(select) {
            hideRejectOptions.forEach(function(option) {
                if (hasReject) {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            });
        });

        var notesElement = document.getElementById(`notesSelect_${value}`);
        var status = document.getElementById(`statusSelect_${value}`);

        var approvalStatus = document.getElementById("select2-approvalStatus-container");
        var approvalStatusName = document.getElementById("approvalStatus");

        var additionalSelect = document.getElementById("additionalSelect");
        var reason = document.getElementById("reason");

        if (status.value == 'Reject') {
            approvalStatus.innerHTML = 'Reject'
            approvalStatusName.value = 'Reject'
            additionalSelect.style.display = "block";
            notesElement.value = 'Document has been rejected'
        } else {
            approvalStatus.innerHTML = '-- Select Recomendation --'
            approvalStatusName.value = null
            additionalSelect.style.display = "none";
            reason.value = '';
            notesElement.value = null
        }


    }

    function clearSignNotes(value) {
        var hideRejectOptions = document.querySelectorAll('option.hideReject');
        var checkAllSelect = document.querySelectorAll('select.documentSelect');
        var hasReject = false;

        checkAllSelect.forEach(function(select) {
            if (select.value == 'Reject') {
                hasReject = true;
            }
        });

        checkAllSelect.forEach(function(select) {
            hideRejectOptions.forEach(function(option) {
                if (hasReject) {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            });
        });

        var approvalStatus = document.getElementById("select2-approvalStatus-container");
        var approvalStatusName = document.getElementById("approvalStatus");

        var additionalSelect = document.getElementById("additionalSelect");
        var reason = document.getElementById("reason");

        var notesSignElement = document.getElementById(`notesSignSelect`);
        var statusSign = document.getElementById(`signSelect`);

        if (statusSign.value == 'Reject') {
            approvalStatus.innerHTML = 'Reject'
            approvalStatusName.value = 'Reject'
            additionalSelect.style.display = "block";
            notesSignElement.value = 'Document has been rejected'
        } else {
            approvalStatus.innerHTML = '-- Select Recomendation --'
            approvalStatusName.value = null
            additionalSelect.style.display = "none";
            reason.value = '';
            notesSignElement.value = null
        }


    }
</script>


<script>
    function handleImageClick(imageUrl, title) {
        var modalImage = document.getElementById('modalImage');
        modalImage.src = imageUrl;
        var modalTitle = document.getElementById('docTitle');
        modalTitle.innerHTML = title;
        var linkDownloadDocument = document.getElementById('linkDownloadDocument');
        linkDownloadDocument.href = imageUrl;
        $('#kt_modal_view_users').modal('show');
    }
</script>
