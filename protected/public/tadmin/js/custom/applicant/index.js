"use strict";
var KTUsersList = (function () {
    var e,
        o = document.getElementById("kt_table_privileges");
    return {
        init: function () {
            o &&
                ((e = $(o).DataTable({
                    info: !1,
                    order: [],
                    pageLength: 10,
                    lengthChange: !1,
                    columnDefs: [
                        { orderable: !1, targets: 0 },
                        { orderable: !1, targets: 4 },
                    ],
                })),
                document
                    .querySelector('[data-kt-user-table-filter="search"]')
                    .addEventListener("keyup", function (t) {
                        e.search(t.target.value).draw();
                    }));
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTUsersList.init();
});
