<x-app-layout>

    <!--begin::Card-->
    <div class="card">
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
                    <input type="text" data-kt-user-table-filter="search" id="searchField"
                        class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">User</th>
                        <th class="min-w-125px">Target User</th>
                        <th class="min-w-125px">Title</th>
                        <th class="min-w-125px">Description</th>
                        <th class="min-w-125px">Activity Date</th>
                        <th class="text-end min-w-100px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                    <!--begin::Table row-->
                    @foreach ($data as $index => $item)
                        <tr>
                            <td>
                                {{ $item->user_username }}
                            </td>
                            <td>{{ $item->target_username }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->created_at->format('d F Y') }}</td>
                            <td class="text-end">
                                <button type="button" class="btn btn-secondary px-3" data-bs-toggle="modal"
                                    data-bs-target="#detail{{ $index }}" data-kt-users-table-filter="delete_row">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </td>
                            <!--end::Action=-->
                        </tr>

                        <div class="modal fade" id="detail{{ $index }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            Detail Activity {{ $item->username }}
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body my-5">
                                        <div class="row mb-3">
                                            <div class="col-4">
                                                User
                                            </div>
                                            <div class="col">
                                                : {{ $item->user_username }}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-4">
                                                Target User
                                            </div>
                                            <div class="col">
                                                : {{ $item->target_username }}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-4">
                                                Activity
                                            </div>
                                            <div class="col">
                                                : {{ $item->title }}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-4">
                                                Detail Activity
                                            </div>
                                            <div class="col">
                                                : {{ $item->description }}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-4">
                                                Activity Date
                                            </div>
                                            <div class="col">
                                                : {{ $item->created_at->format('d F Y H:i') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
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
        {{-- <script src="{{ asset('tadmin/js/custom/deleted.js') }}"></script> --}}

        <script type="module">
            let table = new DataTable('#kt_table_users');
            $('#searchField').on('keyup', function() {
                table.search(this.value).draw();
            });
        </script>
    @endsection
</x-app-layout>
