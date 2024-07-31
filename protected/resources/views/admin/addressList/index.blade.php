<x-app-layout>

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <form action="{{ route('addressList.search') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="text" id="search" name="keyword"
                                @if ($keyword != '') value="{{ $keyword }}" @endif
                                class="form-control form-control-solid w-250px" placeholder="Search District" />
                            <button class="btn btn-primary">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Filter-->
                    <!--begin::Add user-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_user">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                    transform="rotate(-90 11.364 20.364)" fill="black" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        Add Address</button>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete
                        Selected</button>
                </div>
                <!--end::Group actions-->
                <!--begin::Modal - Add task-->
                <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_user_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Add Address</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                    data-kt-users-modal-action="close">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                transform="rotate(45 7.41422 6)" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body modal-xl scroll-y mx-3 mx-xl-10 my-7">
                                <form class="form" action="{{ url('/addresslist/store') }}" method="post">
                                {{-- <form id="kt_modal_add_address" class="form" action="#"> --}}
                                    @csrf
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_address_scroll"
                                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                        data-kt-scroll-max-height="auto"
                                        data-kt-scroll-dependencies="#kt_modal_add_address_header"
                                        data-kt-scroll-wrappers="#kt_modal_add_address_scroll"
                                        data-kt-scroll-offset="300px">
                                        <div class="row">
                                            <div class="col-6">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">Country</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="country"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Fill country" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col-6">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">Country Code</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="country_code"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Fill country code" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col-6">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">Province</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="province"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Fill province" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col-6">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">City</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="city"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Fill city" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col-6">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">District</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="district"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Fill district" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col-6">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">Village</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="village"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Fill village" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col-12">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">Post Code</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="post_code"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        minlength="1" maxlength="5" placeholder="Fill post code" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-users-modal-action="cancel">Reset</button>
                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-users-modal-action="submit">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Add task-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_address">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">Country</th>
                        <th class="min-w-125px">Province</th>
                        <th class="min-w-125px">City</th>
                        <th class="min-w-125px">District</th>
                        <th class="min-w-125px">Village</th>
                        <th class="text-end min-w-100px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                    <!--begin::Table row-->
                    @if(!empty($data))
                    <input type="hidden" name="jumlah" id="jumlah" value="{{ count($data) }}">
                    @endif
                    @forelse ($data as $index=>$item)
                        <tr>
                            <td>
                                {{ $item->country }}
                            </td>
                            <td>
                                {{ $item->province }}
                            </td>
                            <td>{{ $item->city }}</td>
                            <td>{{ $item->district }}</td>
                            <td>{{ $item->village }}</td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a href="{{ route('addressList.get', $item->id) }}"
                                            class="menu-link px-3">Edit</a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $item->id }}"
                                            data-kt-users-table-filter="delete_row">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete
                                        {{ $item->village }}?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body my-5">
                                    <form method="POST" action="{{ route('addresslist.delete', $item->id) }}">
                                        @csrf
                                        Hapus Data Ini??
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center h4 ">
                                Data Tidak Ditemukan
                            </td>
                        </tr>
                    @endforelse
                    <!--end::Table row-->
                    <!--end::Table row-->
                </tbody>
                <!--end::Table body-->
            </table>
            {{ $data->links() }}
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    @section('scripts')
        <script src="{{ asset('tadmin/js/custom/addressList/index.js') }}"></script>
    @endsection
</x-app-layout>
