"use strict";
var KTUsersUpdateUser = (function () {
    const t = document.getElementById("form_update_user"),
    f = document.getElementById("form_update_user")

    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(t, {
                    fields: {
                        code: {
                            validators: {
                                notEmpty: { message: "Region Code is required" },
                            },
                        },
                        region: {
                            validators: {
                                notEmpty: { message: "Region Name is required" },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                });

                const i = t.querySelector(
                    '[data-kt-users-modal-action="submit"]'
                );

                i.addEventListener("click", (t) => {
                    t.preventDefault();

                    o &&
                        o.validate().then(function (t) {
                            if ("Valid" == t) {
                                i.setAttribute("data-kt-indicator", "on");
                                i.disabled = true;

                                var formData = new FormData(f);

                                $.ajax({
                                    url: "/regions/update",
                                    type: "POST",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function (response) {
                                        i.removeAttribute("data-kt-indicator");
                                        i.disabled = false;
                                        console.log(response);
                                        if (response.status) {
                                            Swal.fire({
                                                text: "Form has been successfully submitted!",
                                                icon: "success",
                                                buttonsStyling: false,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: {
                                                    confirmButton: "btn btn-primary",
                                                },
                                            }).then(function (t) {
                                                if (t.isConfirmed) {
                                                    window.location.reload
                                                }
                                            });
                                        } else {
                                            Swal.fire({
                                                text: "Failed update region!",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: {
                                                    confirmButton: "btn btn-primary",
                                                },
                                            });
                                        }
                                    },
                                    error: function (error) {
                                        console.error("Ajax Error:", error);
                                    },
                                });
                            } else {
                                Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
                            }
                        });
                });
            })();
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdateUser.init();
});
