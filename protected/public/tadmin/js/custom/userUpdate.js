"use strict";
var KTUsersUpdateUser = (function () {
    const t = document.getElementById("form_update_user"),
    f = document.getElementById("form_update_user")

    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(t, {
                    fields: {
                        alasan: {
                            validators: {
                                notEmpty: { message: "Reason is required" },
                            },
                        },
                        name: {
                            validators: {
                                notEmpty: { message: "Full name is required" },
                            },
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: "Valid email address is required",
                                },
                            },
                        },
                        username: {
                            validators: {
                                notEmpty: {
                                    message: "Username is required",
                                },
                            },
                        }
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
                                    url: "/users/update",
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
                                                    window.location.reload
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
                                    text: "Sorry, Pay attention to your form again!.",
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
