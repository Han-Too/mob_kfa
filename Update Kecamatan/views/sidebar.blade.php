<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Aside Toolbarl-->
    <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
        <!--begin::Aside user-->
        <!--begin::User-->
        <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
            <!--begin::Symbol-->
            @if (Auth::user()->image)
                <div class="symbol symbol-50px">
                    <img src="{{ Auth::user()->image }}" alt="" />
                </div>
            @endif
            <!--end::Symbol-->
            <!--begin::Wrapper-->
            <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
                <!--begin::Section-->
                <div class="d-flex">
                    <!--begin::Info-->
                    <div class="flex-grow-1 me-2">
                        <!--begin::Username-->
                        <a href="#"
                            class="text-white text-hover-primary fs-6 fw-bold">{{ Auth::user()->name }}</a>
                        <!--end::Username-->
                        <!--begin::Description-->
                        <span class="text-gray-600 fw-bold d-block fs-8 mb-1">{{ Auth::user()->role->title }}</span>
                        <!--end::Description-->
                        <!--begin::Label-->
                        <div class="d-flex align-items-center text-success fs-9">
                            <span class="bullet bullet-dot bg-success me-1"></span>online
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Info-->
                    <!--begin::User menu-->
                    <div class="me-n2">
                        <!--begin::Action-->
                        <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            data-kt-menu-overflow="true">
                            <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                        d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                        fill="black" />
                                    <path
                                        d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    @if (Auth::user()->image)
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img alt="Logo" src="{{ Auth::user()->image }}" />
                                        </div>
                                        <!--end::Avatar-->
                                    @endif
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->name }}
                                            <span
                                                class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ Auth::user()->role->title }}</span>
                                        </div>
                                        <a href="#"
                                            class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="{{ route('user.profile') }}" class="menu-link px-5">My Profile</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit" class="menu-link px-5 text-dark"
                                        style="background: none; border: none; cursor: pointer;">
                                        {{ __('Sign Out') }}
                                    </button>
                                </form>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Action-->
                    </div>
                    <!--end::User menu-->
                </div>
                <!--end::Section-->
            </div>
            <!--end::Wrapper-->
        </div>
    </div>
    <!--end::Aside Toolbarl-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
            data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <div class="menu-content pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                    </div>
                </div>
                {{-- dashboard --}}
                <div class="menu-item">
                    <a class="menu-link {{ request()->segment(1) == '/' ? 'active' : '' }}"
                        href="{{ url('/') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                        fill="black" />
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                        fill="black" />
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                @if (Auth::user()->role_id == 7 || Auth::user()->role_id == 1)
                    {{-- title user --}}
                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Users Management</span>
                        </div>
                    </div>
                    {{-- user list --}}
                    <div class="menu-item">
                        <a class="menu-link {{ Str::startsWith(request()->path(), 'users') ? 'active' : '' }}"
                            href="{{ url('users') }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                            fill="black" />
                                        <rect opacity="0.3" x="8" y="3" width="8" height="8"
                                            rx="4" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">User List</span>
                        </a>
                    </div>
                @endif

                @if (Auth::user()->role_id == 7)
                    <div class="menu-item">
                        <a class="menu-link {{ Str::startsWith(request()->path(), 'logs') ? 'active' : '' }}"
                            href="{{ route('logs') }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 512 512" fill="none">
                                        <path fill="none"
                                            d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm161.5-86.1c-12.2-5.2-26.3 .4-31.5 12.6s.4 26.3 12.6 31.5l11.9 5.1c17.3 7.4 35.2 12.9 53.6 16.3v50.1c0 4.3-.7 8.6-2.1 12.6l-28.7 86.1c-4.2 12.6 2.6 26.2 15.2 30.4s26.2-2.6 30.4-15.2l24.4-73.2c1.3-3.8 4.8-6.4 8.8-6.4s7.6 2.6 8.8 6.4l24.4 73.2c4.2 12.6 17.8 19.4 30.4 15.2s19.4-17.8 15.2-30.4l-28.7-86.1c-1.4-4.1-2.1-8.3-2.1-12.6V235.5c18.4-3.5 36.3-8.9 53.6-16.3l11.9-5.1c12.2-5.2 17.8-19.3 12.6-31.5s-19.3-17.8-31.5-12.6L338.7 175c-26.1 11.2-54.2 17-82.7 17s-56.5-5.8-82.7-17l-11.9-5.1zM256 160a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">User Logs</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Str::startsWith(request()->path(), 'deleted') ? 'active' : '' }}"
                            href="{{ route('deleted') }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 640 512">
                                        <path fill="none"
                                            d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L353.3 251.6C407.9 237 448 187.2 448 128C448 57.3 390.7 0 320 0C250.2 0 193.5 55.8 192 125.2L38.8 5.1zM264.3 304.3C170.5 309.4 96 387.2 96 482.3c0 16.4 13.3 29.7 29.7 29.7H514.3c3.9 0 7.6-.7 11-2.1l-261-205.6z" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Deleted User</span>
                        </a>
                    </div>
                @endif

                @if (Auth::user()->role_id == 7 || Auth::user()->role_id == 1)
                    {{-- previlege master --}}
                    <div class="menu-item">
                        <a class="menu-link {{ Str::startsWith(request()->path(), 'privileges') ? 'active' : '' }}"
                            href="{{ route('privilege.index') }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                            fill="black" />
                                        <path
                                            d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Master Privilege</span>
                        </a>
                    </div>
                    {{-- <div class="menu-item">
                    <a class="menu-link" href="../../demo8/dist/apps/calendar.html">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21 10.7192H3C2.4 10.7192 2 11.1192 2 11.7192C2 12.3192 2.4 12.7192 3 12.7192H6V14.7192C6 18.0192 8.7 20.7192 12 20.7192C15.3 20.7192 18 18.0192 18 14.7192V12.7192H21C21.6 12.7192 22 12.3192 22 11.7192C22 11.1192 21.6 10.7192 21 10.7192Z" fill="black" />
                                    <path d="M11.6 21.9192C11.4 21.9192 11.2 21.8192 11 21.7192C10.6 21.4192 10.5 20.7191 10.8 20.3191C11.7 19.1191 12.3 17.8191 12.7 16.3191C12.8 15.8191 13.4 15.4192 13.9 15.6192C14.4 15.7192 14.8 16.3191 14.6 16.8191C14.2 18.5191 13.4 20.1192 12.4 21.5192C12.2 21.7192 11.9 21.9192 11.6 21.9192ZM8.7 19.7192C10.2 18.1192 11 15.9192 11 13.7192V8.71917C11 8.11917 11.4 7.71917 12 7.71917C12.6 7.71917 13 8.11917 13 8.71917V13.0192C13 13.6192 13.4 14.0192 14 14.0192C14.6 14.0192 15 13.6192 15 13.0192V8.71917C15 7.01917 13.7 5.71917 12 5.71917C10.3 5.71917 9 7.01917 9 8.71917V13.7192C9 15.4192 8.4 17.1191 7.2 18.3191C6.8 18.7191 6.9 19.3192 7.3 19.7192C7.5 19.9192 7.7 20.0192 8 20.0192C8.3 20.0192 8.5 19.9192 8.7 19.7192ZM6 16.7192C6.5 16.7192 7 16.2192 7 15.7192V8.71917C7 8.11917 7.1 7.51918 7.3 6.91918C7.5 6.41918 7.2 5.8192 6.7 5.6192C6.2 5.4192 5.59999 5.71917 5.39999 6.21917C5.09999 7.01917 5 7.81917 5 8.71917V15.7192V15.8191C5 16.3191 5.5 16.7192 6 16.7192ZM9 4.71917C9.5 4.31917 10.1 4.11918 10.7 3.91918C11.2 3.81918 11.5 3.21917 11.4 2.71917C11.3 2.21917 10.7 1.91916 10.2 2.01916C9.4 2.21916 8.59999 2.6192 7.89999 3.1192C7.49999 3.4192 7.4 4.11916 7.7 4.51916C7.9 4.81916 8.2 4.91918 8.5 4.91918C8.6 4.91918 8.8 4.81917 9 4.71917ZM18.2 18.9192C18.7 17.2192 19 15.5192 19 13.7192V8.71917C19 5.71917 17.1 3.1192 14.3 2.1192C13.8 1.9192 13.2 2.21917 13 2.71917C12.8 3.21917 13.1 3.81916 13.6 4.01916C15.6 4.71916 17 6.61917 17 8.71917V13.7192C17 15.3192 16.8 16.8191 16.3 18.3191C16.1 18.8191 16.4 19.4192 16.9 19.6192C17 19.6192 17.1 19.6192 17.2 19.6192C17.7 19.6192 18 19.3192 18.2 18.9192Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">User Privilege</span>
                    </a>
                </div> --}}
                @endif

                {{-- merchantt --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Merchants</span>
                    </div>
                </div>


                <div class="menu-item">
                    <a class="menu-link  {{ request()->segment(1) == 'merchants' ? 'active' : '' }}"
                        href="{{ url('merchants') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                        d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                        fill="black" />
                                    <path
                                        d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Merchant List</span>
                    </a>
                </div>

                @if (Auth::user()->role_id == 7 || Auth::user()->role_id == 1)
                    {{-- all applicanttt --}}
                    <div class="menu-item">
                        <a class="menu-link {{ request()->segment(1) == 'applicants' ? 'active' : '' }}"
                            href="{{ url('applicants') }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                            fill="black" />
                                        <path
                                            d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">All Applicants</span>
                        </a>
                    </div>
                @else
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ request()->segment(2) == 'applicants' ? 'hover show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z"
                                            fill="black" />
                                        <path
                                            d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Status Permohonan</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div
                            class="menu-sub menu-sub-accordion menu-active-bg {{ Str::startsWith(request()->path(), 'categories') || Str::startsWith(request()->path(), 'payments') ? 'hover show' : '' }}">
                            <div class="menu-item">
                                <a class="menu-link {{ Str::startsWith(request()->path(), 'new-request') ? 'active' : '' }}"
                                    href="{{ url('new-request/applicants') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">New Request</span>
                                    <span
                                        class="badge badge-lg badge-light-success">{{ App\Helpers\Utils::getTotalFeatures(null, 'new-request') }}</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ Str::startsWith(request()->path(), 'process') ? 'active' : '' }}"
                                    href="{{ url('process/applicants') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Process</span>
                                    <span
                                        class="badge badge-lg badge-light-primary">{{ App\Helpers\Utils::getTotalFeatures(null, 'process') }}</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ Str::startsWith(request()->path(), 'updated') ? 'active' : '' }}"
                                    href="{{ url('updated/applicants') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Updated</span>
                                    <span
                                        class="badge badge-lg badge-light-info">{{ App\Helpers\Utils::getTotalFeatures(null, 'updated') }}</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ Str::startsWith(request()->path(), 'approved') ? 'active' : '' }}"
                                    href="{{ url('approved/applicants') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Approved</span>
                                    <span
                                        class="badge badge-lg badge-light-success">{{ App\Helpers\Utils::getTotalFeatures(null, 'approved') }}</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ Str::startsWith(request()->path(), 'reject') ? 'active' : '' }}"
                                    href="{{ url('reject/applicants') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Rejected</span>
                                    <span
                                        class="badge badge-lg badge-light-warning">{{ App\Helpers\Utils::getTotalFeatures(null, 'reject') }}</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ Str::startsWith(request()->path(), 'close') ? 'active' : '' }}"
                                    href="{{ url('close/applicants') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Close</span>
                                    <span
                                        class="badge badge-lg badge-light-danger">{{ App\Helpers\Utils::getTotalFeatures(null, 'close') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if (request()->segment(2) == 'payments')
                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Fitur Pembayaran</span>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ request()->segment(2) == 'payments' ? 'hover show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z"
                                                fill="black" />
                                            <path
                                                d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Status Fitur Pembayaran</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div
                                class="menu-sub menu-sub-accordion menu-active-bg {{ Str::startsWith(request()->path(), 'categories') || Str::startsWith(request()->path(), 'payments') ? 'hover show' : '' }}">
                                <div class="menu-item">
                                    <a class="menu-link {{ Str::startsWith(request()->path(), 'new-request') ? 'active' : '' }}"
                                        href="{{ url('new-request/payments', collect(explode('/', request()->url()))->last()) }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">New Request</span>
                                        <span
                                            class="badge badge-lg badge-light-success">{{ App\Helpers\Utils::getTotalFeatures(collect(explode('/', request()->url()))->last(), 'new-request') }}</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ Str::startsWith(request()->path(), 'process') ? 'active' : '' }}"
                                        href="{{ url('process/payments', collect(explode('/', request()->url()))->last()) }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Process</span>
                                        <span
                                            class="badge badge-lg badge-light-primary">{{ App\Helpers\Utils::getTotalFeatures(collect(explode('/', request()->url()))->last(), 'process') }}</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ Str::startsWith(request()->path(), 'updated') ? 'active' : '' }}"
                                        href="{{ url('updated/payments', collect(explode('/', request()->url()))->last()) }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Updated</span>
                                        <span
                                            class="badge badge-lg badge-light-info">{{ App\Helpers\Utils::getTotalFeatures(collect(explode('/', request()->url()))->last(), 'updated') }}</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ Str::startsWith(request()->path(), 'approved') ? 'active' : '' }}"
                                        href="{{ url('approved/payments', collect(explode('/', request()->url()))->last()) }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Approved</span>
                                        <span
                                            class="badge badge-lg badge-light-success">{{ App\Helpers\Utils::getTotalFeatures(collect(explode('/', request()->url()))->last(), 'approved') }}</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ Str::startsWith(request()->path(), 'reject') ? 'active' : '' }}"
                                        href="{{ url('reject/payments', collect(explode('/', request()->url()))->last()) }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Rejected</span>
                                        <span
                                            class="badge badge-lg badge-light-warning">{{ App\Helpers\Utils::getTotalFeatures(collect(explode('/', request()->url()))->last(), 'reject') }}</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ Str::startsWith(request()->path(), 'close') ? 'active' : '' }}"
                                        href="{{ url('close/payments', collect(explode('/', request()->url()))->last()) }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Close</span>
                                        <span
                                            class="badge badge-lg badge-light-danger">{{ App\Helpers\Utils::getTotalFeatures(collect(explode('/', request()->url()))->last(), 'close') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif

                @if (Auth::user()->role_id == 7 || Auth::user()->role_id == 1)
                    {{-- sales --}}
                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Sales</span>
                        </div>
                    </div>
                    {{-- regionn --}}
                    <div class="menu-item">
                        <a class="menu-link {{ Str::startsWith(request()->path(), 'regions') ? 'active' : '' }}"
                            href="{{ url('regions') }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                            fill="black" />
                                        <path
                                            d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Region</span>
                        </a>
                    </div>
                    {{-- opp --}}
                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Operational</span>
                        </div>
                    </div>
                    {{-- bankk --}}
                    <div class="menu-item">
                        <a class="menu-link {{ Str::startsWith(request()->path(), 'banks') ? 'active' : '' }}"
                            href="{{ url('banks') }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Bank</span>
                        </a>
                    </div>

                    {{-- master produkk --}}
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ Str::startsWith(request()->path(), 'categories') || Str::startsWith(request()->path(), 'payments') ? 'hover show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z"
                                            fill="black" />
                                        <path
                                            d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Master Product</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div
                            class="menu-sub menu-sub-accordion menu-active-bg {{ Str::startsWith(request()->path(), 'categories') || Str::startsWith(request()->path(), 'payments') ? 'hover show' : '' }}">
                            <div class="menu-item">
                                <a class="menu-link {{ Str::startsWith(request()->path(), 'payments') ? 'active' : '' }}"
                                    href="{{ url('payments') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Payment Features</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ Str::startsWith(request()->path(), 'categories') ? 'active' : '' }}"
                                    href="{{ url('categories') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Merchant Outlets</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ Str::startsWith(request()->path(), 'outlets') ? 'active' : '' }}"
                                    href="{{ url('outlets') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Merchant Categories</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- bannerr --}}
                    <div class="menu-item">
                        <a class="menu-link {{ Str::startsWith(request()->path(), 'banners') ? 'active' : '' }}"
                            href="{{ url('banners') }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M21 18.3V4H20H5C4.4 4 4 4.4 4 5V20C10.9 20 16.7 15.6 19 9.5V18.3C18.4 18.6 18 19.3 18 20C18 21.1 18.9 22 20 22C21.1 22 22 21.1 22 20C22 19.3 21.6 18.6 21 18.3Z"
                                            fill="black" />
                                        <path
                                            d="M22 4C22 2.9 21.1 2 20 2C18.9 2 18 2.9 18 4C18 4.7 18.4 5.29995 18.9 5.69995C18.1 12.6 12.6 18.2 5.70001 18.9C5.30001 18.4 4.7 18 4 18C2.9 18 2 18.9 2 20C2 21.1 2.9 22 4 22C4.8 22 5.39999 21.6 5.79999 20.9C13.8 20.1 20.1 13.7 20.9 5.80005C21.6 5.40005 22 4.8 22 4Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Banner</span>
                        </a>
                    </div>

                    {{-- approve reasonn --}}
                    <div class="menu-item">
                        <a class="menu-link {{ Str::startsWith(request()->path(), 'reasons') ? 'active' : '' }}"
                            href="{{ url('reasons') }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path d="M22 7H2V11H22V7Z" fill="black" />
                                        <path opacity="0.3"
                                            d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Approval Reason List</span>
                        </a>
                    </div>
                    {{-- document approvee --}}
                    <div class="menu-item">
                        <a class="menu-link {{ Str::startsWith(request()->path(), 'documents') ? 'active' : '' }}"
                            href="{{ url('documents') }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                                            fill="black" />
                                        <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black" />
                                        <path
                                            d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Document Requirement</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Str::startsWith(request()->path(), 'addresslist') ? 'active' : '' }}"
                            href="{{ url('addresslist') }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path fill="black"
                                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">List Address</span>
                        </a>
                    </div>
                @endif
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    {{-- <div class="aside-footer flex-column-auto py-5" id="kt_aside_footer">
        <a href="../../demo8/dist/documentation/getting-started.html" class="btn btn-custom btn-primary w-100"
            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
            title="200+ in-house components and 3rd-party plugins">
            <span class="btn-label">API Components</span>
            <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
            <span class="svg-icon btn-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.3"
                        d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
                        fill="black" />
                    <rect x="7" y="17" width="6" height="2" rx="1" fill="black" />
                    <rect x="7" y="12" width="10" height="2" rx="1" fill="black" />
                    <rect x="7" y="7" width="6" height="2" rx="1" fill="black" />
                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a>
    </div> --}}
    <!--end::Footer-->
</div>
