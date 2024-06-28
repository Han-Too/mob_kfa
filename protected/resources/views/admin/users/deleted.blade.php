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
                        {{-- <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                            </div>
                        </th> --}}
                        <th class="min-w-125px">User</th>
                        <th class="min-w-125px">Username</th>
                        <th class="min-w-125px">Role</th>
                        <th class="min-w-125px">Status</th>
                        <th class="min-w-125px">Delete Date</th>
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
                            <!--begin::Checkbox-->
                            {{-- <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1"
                                        name="delete[]" />
                                </div>
                            </td> --}}
                            <!--end::Checkbox-->
                            <!--begin::User=-->
                            <td class="d-flex align-items-center">
                                <!--begin:: Avatar -->
                                @if ($item->image)
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        <a href="{{ route('user.edit', $item->token) }}">
                                            <div class="symbol-label">
                                                <img src="{{ $item->image }}" alt="Avatar" class="w-100" />
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                <!--end::Avatar-->
                                <!--begin::User details-->
                                <div class="d-flex flex-column">
                                    <a href="{{ route('user.edit', $item->token) }}"
                                        class="text-gray-800 text-hover-primary mb-1">{{ $item->name }}</a>
                                    <span>{{ $item->email }}</span>
                                </div>
                                <!--begin::User details-->
                            </td>
                            <!--begin::Last login=-->
                            <td>
                                {{ $item->username }}
                            </td>
                            <!--end::Last login=-->
                            <!--end::User=-->
                            <!--begin::Role=-->
                            <td>{{ $item->role->title }}</td>
                            <!--end::Role=-->
                            <!--begin::Two step=-->
                            <td>{{ $item->status }}</td>
                            <!--end::Two step=-->
                            <!--begin::Joined-->
                            <td>{{ $item->updated_at->format('Y F d') }}</td>
                            <!--begin::Joined-->
                            <!--begin::Action=-->
                            <td class="text-end">
                                <button class="btn btn-light btn-active-light-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#activateModal{{ $index }}">
                                    Reactivation
                                </button>
                                <!--
                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    Actions
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
                                    begin::Menu item
                                    <div class="menu-item px-3">
                                        <a href="{{ route('user.edit', $item->token) }}" class="menu-link px-3">Edit</a>
                                    </div>
                                    <div class="menu-item px-3">
                                        {{-- <a href="{{ route('user.delete', $item->token) }}" class="menu-link px-3" --}}
                                        <a class="menu-link px-3" 
                                            data-kt-users-table-filter="delete_row">Reactivation</a>
                                    </div>
                                </div>
                            -->
                            </td>
                            <!--end::Action=-->
                        </tr>

                        <div class="modal fade" id="activateModal{{ $index }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reactivation
                                            {{ $item->username }}?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body my-5">
                                        <form method="POST" action="{{ route('activate', $item->token) }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="required fw-bold fs-6 mb-2">New Password</label>
                                                <input type="password" name="password"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Fill Password" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="required fw-bold fs-6 mb-2">Reason</label>
                                                <textarea name="alasan" required id="alasan" class="form-control form-control-solid mb-3 mb-lg-0"></textarea>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Reactivation</button>
                                    </div>
                                    </form>
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
        {{-- <script src="{{ asset('tadmin/js/custom/user.js') }}"></script> --}}
        <script type="module">
            let table = new DataTable('#kt_table_users');
            $('#searchField').on('keyup', function() {
                table.search(this.value).draw();
            });
        </script>
    @endsection
</x-app-layout>
