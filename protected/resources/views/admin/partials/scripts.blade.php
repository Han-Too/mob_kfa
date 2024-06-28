@stack('script')
<script>
    var hostUrl = "{{ asset('tadmin/') }}";
    var baseUrl = "https://dev-mob.cashlez.com/mob/";
</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('tadmin/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('tadmin/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('tadmin/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('tadmin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('tadmin/js/custom/widgets.js') }}"></script>
<script src="{{ asset('tadmin/js/custom/modals/users-search.js') }}"></script>
<script src="{{ asset('tadmin/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Page Custom Javascript-->
@yield('scripts');
