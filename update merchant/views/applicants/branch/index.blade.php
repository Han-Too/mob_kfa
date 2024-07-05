<x-app-layout>

    <!--begin::Card-->
    <div class="card">
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title d-block">
                <h2>Merchant's Branch</h2>
                <h4 class="fw-bold fs-6 mb-2 mt-2 text-muted">Management of {{ $merchant->nama_merchant }} branch</h4>
            </div>
                
            <div class="d-flex my-4">
                <a href="{{ URL::previous() }}"
                    class="btn btn-sm btn-danger me-2">
                    <!--begin::Indicator-->
                    <span class="indicator-label">< Back</span>
                    <!--end::Indicator-->
                </a>
                <a href="{{ route('applicant.show', $merchant->token_applicant) }}"
                    class="btn btn-sm btn-primary me-2">
                    <!--begin::Indicator-->
                    <span class="indicator-label">View Merchant</span>
                    <!--end::Indicator-->
                </a>
            </div>
            <!--begin::Card title-->
        </div>
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-14" placeholder="Search Payment" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <div class="mb-0 me-4 px-2">
                        <input class="form-control form-control-solid text-center" placeholder="Pick date rage" id="kt_daterangepicker_1" style="width: 250px;"/>
                    </div>
                    <!--begin::Filter-->
                    <!--begin::Add user-->
                    <button type="button" class="btn btn-sm btn-flex btn-primary btn-active-success btn-filter">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Filter</button>
                        @if(isset(request()->dateRange))
                            <a href="{{ url()->current() }}" class="btn btn-sm btn-flex btn-warning ms-2">Clear Filter</a>
                        @endif
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_privileges">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-150px">Application Date</th>
                        <th class="min-w-125px">Address</th>
                        <th class="min-w-100px">Total EDC</th>
                        <th class="min-w-125px text-center">Update By</th>
                        <th class="min-w-125px text-center">Internal Status</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                    <!--begin::Table row-->
                    @foreach ($data as $item)
                        <tr>
                            <td style="vertical-align: top">
                                {{ $item->created_at->format('d F Y') }}
                            </td>
                            <!--begin::Role=-->
                            <td style="vertical-align: top">
                                {{ $item->alamat }}
                            </td>
                            <td class="text-center" style="vertical-align: top">
                                {{ $item->kebutuhan_edc }}
                            </td>
                            <!--begin::Joined-->
                            <td style="vertical-align: top">
                                <div class="d-flex align-items-center mb-7">
                                    <!--begin::Title-->
                                    <div class="flex-grow-1 me-2">
                                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">{{ App\Helpers\Utils::getUserName($item->update_by) }}</a>
                                        <span class="text-muted fw-bold d-block">{{ App\Helpers\Utils::getUserRole($item->update_by) }}</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </td>
                            <!--begin::Joined-->
                            <td style="vertical-align: top" class="text-end">
                                <span
                                    class="d-flex flex-column badge badge-lg badge-light-{{ App\Helpers\Utils::badgeApplicant($item->status) }}">{{ App\Helpers\Utils::internalPaymentStatusByRecomendation($item->internal_status) }}</span>
                                @if ( $item->layer_id == App\Helpers\Utils::getLayerIdByRole(Auth::user()->role_id))
                                    <a href="{{ url('/applicants/branches/show/'.$item->id.'/'.$merchant->token_applicant) }}"
                                        class="d-flex flex-column btn btn-sm btn-success mt-2">Process</a>
                                @else
                                    <a href="{{ url('/applicants/branches/show/'.$item->id.'/'.$merchant->token_applicant) }}"
                                        class="d-flex flex-column btn btn-sm btn-primary mt-2">View Detail</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <!--end::Table row-->
                    <!--end::Table row-->
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    @section('scripts')
        <script src="{{ asset('tadmin/js/custom/applicant/branch/index.js') }}"></script>
        <script>
            $("#kt_daterangepicker_1").daterangepicker();
        </script>
        <script>
            $(document).ready(function() {
                $('.btn-filter').on('click', function() {
                    var dateRangeValue = $('#kt_daterangepicker_1').val();

                    var newUrl = window.location.href.split('?')[0] + '?dateRange=' + encodeURIComponent(dateRangeValue);
                    window.location.href = newUrl;
                });
            });
        </script>
    @endsection
</x-app-layout>
