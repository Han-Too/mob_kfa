"use strict";
var KTUsersAddUser = (function () {
    const t = document.getElementById("kt_modal_add_user"),
        e = t.querySelector("#kt_modal_add_user_form"),
        n = new bootstrap.Modal(t);

    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(e, {
                    fields: {
                        title: {
                            validators: {
                                notEmpty: { message: "Reason Title is required" },
                            },
                        },
                        type: {
                            validators: {
                                notEmpty: { message: "Reason Type is required" },
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
                                var formData = new FormData(e);

                                $.ajax({
                                    url: "/reasons/store",
                                    type: "POST",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function (response) {
                                        i.removeAttribute("data-kt-indicator");
                                        i.disabled = false;

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
                                                    window.location.href = '/reasons'
                                                }
                                            });
                                        } else {
                                            Swal.fire({
                                                text: "Format is invalid!",
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
                t
                .querySelector('[data-kt-users-modal-action="close"]')
                .addEventListener("click", (t) => {
                    t.preventDefault(),
                        Swal.fire({
                            text: "Are you sure you would like to cancel?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, cancel it!",
                            cancelButtonText: "No, return",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light",
                            },
                        }).then(function (t) {
                            t.value
                                ? (e.reset(), n.hide())
                                : "cancel" === t.dismiss &&
                                  Swal.fire({
                                      text: "Your form has not been cancelled!.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Ok, got it!",
                                      customClass: {
                                          confirmButton:
                                              "btn btn-primary",
                                      },
                                  });
                        });
                });
            })();
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTUsersAddUser.init();
});
