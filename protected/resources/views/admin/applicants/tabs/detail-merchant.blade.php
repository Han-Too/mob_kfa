<div class="card p-5">
    <div class="card-body p-5 row">
        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 7)
            <form action="" id="updateDetail_form" class=" px-3">
            @else
        @endif
        @csrf
        <input type="hidden" value="{{ $data->token_applicant }}" name="token">
        <!--begin::Row-->
        <div class="card-title fs-4 fw-bolder">Data Pemilik Usaha</div>
        <div class="separator my-2"></div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Nama Pemilik Merchant</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->nama_pemilik_merchant }}"
                    disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Jenis Kelamin</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->jenis_kelamin_pemilik }}"
                    disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Tempat, Tanggal Lahir</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid border border-primary" name="ttl_milik"
                    value="{{ $data->tempat_lahir.','.$data->tanggal_lahir }}"
                    {{-- value="{{ $data->tempat_lahir . ', ' . date('d F Y', strtotime($data->tanggal_lahir)) }}" --}}
                    @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 6) disabled @endif />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Alamat Sesuai KTP</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control border border-primary form-control-solid"
                    value="{{ $data->alamat_sesuai_ktp }}" name="alamatktp_milik"
                    @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 6) disabled @endif />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Alamat Domisili Saat Ini</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control border border-primary form-control-solid"
                    value="{{ $data->alamat_domisili }}" name="alamatdomisili_milik"
                    @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 6) disabled @endif />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Kewarganegaraan</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->kewarganegaraan }}"
                    disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">E-mail</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control border border-primary form-control-solid"
                    value="{{ $data->email }}" name="email_milik" @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 6) disabled @endif />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Nomor Identitas</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->nomor_identitas }}"
                    disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Nomor Handphone</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->nomor_hp }}" disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">NPWP</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control border border-primary form-control-solid"
                    value="{{ $data->npwp }}" name="npwp_milik" maxlength="16"
                    @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 6) disabled @endif />
            </div>
        </div>
        <div class="card-title fs-4 fw-bolder">Data Pengurus Merchant (PIC)</div>
        <div class="separator my-2"></div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Nama Pengurus Merchant</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid"
                    value="{{ $data->nama_pengurus_merchant }}" disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Jenis Kelamin</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid"
                    value="{{ $data->jenis_kelamin_pengurus }}" disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Alamat</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control border border-primary form-control-solid"
                    value="{{ $data->alamat_pejabat_berwenang }}" name="alamat_pengurus"
                    @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 6) disabled @endif />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Kewarganegaraan</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid"
                    value="{{ $data->kewarganegaraan_pengurus }}" disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Nomor Identitas</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid"
                    value="{{ $data->nomor_identitas_pengurus }}" disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">E-mail</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control border border-primary form-control-solid"
                    value="{{ $data->email_pengurus }}" name="email_pengurus"
                    @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 6) disabled @endif />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Nomor Handphone</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->nomor_hp_pengurus }}"
                    disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Kewarganegaraan</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->kewarganegaraan }}"
                    disabled />
            </div>
        </div>
        {{-- @if ($data->pengajuan_sebagai == 'Perorangan')
            @include('admin.applicants.tabs.perorangan')
        @else
            @include('admin.applicants.tabs.badan-usaha')
        @endif --}}
        <div class="card-title fs-4 fw-bolder">Data Merchant</div>
        <div class="separator my-2"></div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Nama Merchant</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->nama_merchant }}"
                    disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Pengajuan Sebagai</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->pengajuan_sebagai }}"
                    disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Tahun Berdiri</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->tahun_berdiri }}"
                    disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Jenis Usaha</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->jenis_usaha }}"
                    disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Tempat Usaha</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->tempat_bisnis }}"
                    disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Kategori Usaha</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->mcc }}"
                    disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Fitur Pembayaran </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="d-flex fw-bold h-100">
                    @foreach ($data->payments as $payment)
                        <div class="form-check form-check-custom form-check-solid me-9">
                            <input class="form-check-input" type="checkbox" checked disabled />
                            <label class="form-check-label ms-3">{{ $payment->payment }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Email Usaha</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control border border-primary form-control-solid"
                    value="{{ $data->bisnis_email }}" name="email_usaha"
                    @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 6) disabled @endif />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">No Telepon Usaha</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->bisnis_no_hp }}"
                    disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Alamat Usaha</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control border border-primary form-control-solid"
                    value="{{ $data->alamat_bisnis }}" name="alamat_usaha"
                    @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 6) disabled @endif />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Latitude, Longitude</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid"
                    value="{{ $data->m_lat }}, {{ $data->m_lng }}" disabled />
            </div>
        </div>
        @if ($data->pengajuan_sebagai == 'Badan Usaha')
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">NPWP Badan Usaha</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control border border-primary form-control-solid"
                        value="{{ $data->npwp_merchant_badan_usaha }}" maxlength="16" name="npwp_badanusaha"
                        @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 6) disabled @endif />
                </div>
            </div>
        @endif
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Store URL</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                @if ($data->store_url != '')
                    <input type="text" class="form-control form-control-solid" value="{{ $data->store_url }}"
                        name="url_usaha" />
                @else
                    <input type="text" class="form-control form-control-solid" value="{{ $data->store_url }}"
                        disabled />
                @endif
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Status Kepemilikan Usaha</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid"
                    value="{{ $data->status_tempat_usaha }}" disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Omset Per Bulan</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid"
                    value="Rp. {{ number_format((float) $data->omset_rata_rata) }}" disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Sumber Data</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->sumber_data }}"
                    disabled />
            </div>
        </div>

        <div class="card-title fs-4 fw-bolder">Data Bank</div>
        <div class="separator my-2"></div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Nama Bank</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" value="{{ $data->nama_bank }}"
                    disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Nomor Rekening Bank Penampung</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid"
                    value="{{ $data->nomor_rekening_bank_penampung }}" disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Nama Pemilik Rekening Merchant/Badan Usaha</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid"
                    value="{{ $data->nama_pemilik_rekening_merchant_badan_usaha }}" disabled />
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">E-mail Settlement</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control border border-primary form-control-solid"
                    value="{{ $data->email_settlement }}" name="email_settle"
                    @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 6) disabled @endif />
            </div>
        </div>


        <div class="card-title fs-4 fw-bolder">Data Sales</div>
        <div class="separator my-2"></div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">Nama Sales</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid"
                    value="{{ $data->user->referal_code }}" disabled />
            </div>
        </div>

        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 7)
            <div class="col-12 my-5">
                <div class="d-grid gap-2">
                    <button type="submit" id="updateData" class="btn btn-primary">
                        Update Data
                    </button>
                </div>
            </div>
            </form>
        @else
            <div class=""></div>
        @endif
    </div>


</div>
@if (Auth::user()->role_id != 3)
    <div class="row gx-xl-10 mt-4">
        <div class="col-xl-7">
            <div class="card mb-xl-10 p-5">
                <form action="" class="form row card-body p-5" id="update_approval_applicant"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="token" value="{{ $data->token_applicant }}">
                    @if (Auth::user()->role_id == 1 || $data->layer_id == 2)
                        <div class="col-xl-12 fv-row" id="summaryProcess">
                            <div class="fs-3 fw-bolder mt-2 mb-3 text-center">Merchant Detail Process</div>
                            <select onchange="showMerchantSelect()" id="approvalMerchant" name="status_approval"
                                aria-label="Select Recomendation" data-control="select2"
                                class="form-select form-select-sm form-select-solid">
                                <option value="">-- Select Recomendation --</option>
                                <option value="Approve">Approve</option>
                                <option value="Reject">Reject</option>
                            </select>
                            <div style="display: none" class="select_reason" id="additionalMerchantSelect">
                                <select id="reason" name="reason" aria-label="Pilih Alasan"
                                    data-control="select2" class="form-select form-select-sm form-select-solid mt-2">
                                    <option value="">-- Pilih Alasan --</option>
                                    @foreach ($reason as $item)
                                        <option value="{{ $item->title }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <textarea name="notes_approval" class="form-control form-control-flush mb-3" rows="1"
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
                                <textarea name="notes_approval" disabled class="form-control form-control-flush mb-3" rows="1"
                                    placeholder="Type a notes">{{ $merchantApproval->notes }}</textarea>
                            </div>
                        @endif
                    @endif
                </form>
            </div>
        </div>
    </div>
    @else
        <div class="row gx-xl-10 mt-4">
            <div class="col-xl">
                <!--begin::List Widget 5-->
                <div class="card card-xl-stretch mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header align-items-center border-0 mt-4">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="fw-bolder mb-2 text-dark">History Approval Merchant Detail</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::uTimeline-->
                        @if (count($detailHis))
                            <div class="timeline-label">
                                @foreach ($detailHis as $item)
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
@endif
@push('script')
    <script>
        function showMerchantSelect() {
            var approvalStatus = document.getElementById("approvalMerchant");
            var additionalSelect = document.getElementById("additionalMerchantSelect");

            var reason = document.getElementById("reason");

            if (approvalStatus.value === "Reject") {
                additionalSelect.style.display = "block";
            } else if (approvalStatus.value === "Approve") {
                additionalSelect.style.display = "none";
                additionalSelect.value = null
                reason.value = '';
            } else {
                additionalSelect.style.display = "none";
                reason.value = '';
                additionalSelect.value = null
            }
        }
    </script>
@endpush
