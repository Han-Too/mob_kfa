<div class="card p-5">
    <div class="card-body p-5 row">
        <form action="" id="updateUsername_form" class=" px-3">
            @csrf
            <!--begin::Row-->
            <div class="card-title fs-4 fw-bolder">Ubah Username Merchant</div>
            <div class="separator my-2"></div>
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">Old Username</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <input type="hidden" value="{{ $data->token_applicant }}" name="token">
                <input type="hidden" name="id" class="form-control form-control-solid" value="{{ $data->user->id }}"/>
                {{-- <div class="col-xl-9 fv-row">
                </div> --}}
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" value="{{ $data->username }}"
                        disabled />
                </div>
            </div>
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3 fv-row">
                    <div class="fs-6 fw-bold mt-2 mb-3">New Username</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <input type="text" name="newusername" class="form-control form-control-solid border border-primary" max="30" maxlength="30"/>
                </div>
            </div>

            <div class="col-12 my-5">
                <div class="d-grid gap-2">
                    <button type="submit" id="updateData" class="btn btn-primary">
                        Update Username
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@push('script')
    <script>
        
    </script>
@endpush
