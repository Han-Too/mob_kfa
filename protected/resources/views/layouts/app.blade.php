<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
@include('admin.partials.head')
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">

    @if (session()->has('msg'))
        <script type="text/javascript">
            Swal.fire({
                title: "Success",
                text: "{{ session()->get('msg') }}",
                icon: "success"
            });
        </script>
    @endif
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->

            {{-- @if (Auth::user()->role_id != "1" || Auth::user()->role_id != "7")
                @include('admin.partials.sidebar-mo')
            @else
            @include('admin.partials.sidebar')
            @endif --}}
            
            @include('admin.partials.sidebar')

            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                @include('admin.partials.header')
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container-xxl">
                            {{ $slot }}
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                @include('admin.partials.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Scrolltop-->
    @include('admin.partials.scrolltop')
    <!--end::Scrolltop-->

    <!--begin::Javascript-->
    @include('admin.partials.scripts')
    @push('scripts')
        <!--end::Javascript-->
    </body>
    <!--end::Body-->

    </html>
