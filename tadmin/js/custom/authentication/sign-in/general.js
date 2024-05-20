"use strict";
var KTSigninGeneral = (function () {
    var t, e, i;
    return {
        init: function () {
            (t = document.querySelector("#kt_sign_in_form")),
                (e = document.querySelector("#kt_sign_in_submit")),
                (i = FormValidation.formValidation(t, {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: "Username is required",
                                },
                            },
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "The password is required",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                        }),
                    },
                })),
                e.addEventListener("click", function (n) {
                    n.preventDefault(), n.preventDefault();
                    
                    // Dapatkan nilai dari formulir
                    var username = t.querySelector('[name="username"]').value;
                    var password = t.querySelector('[name="password"]').value;

                    var data = {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        username: username,
                        password: password
                    };

                    $.ajax({
                        url: "api/portal/login",
                        type: "POST",
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            var parsedJSON = JSON.parse(response);
                            if (parsedJSON.status) {
                                e.setAttribute("data-kt-indicator", "on");
                                e.disabled = true;

                                setTimeout(function () {
                                    e.removeAttribute("data-kt-indicator");
                                    e.disabled = false;

                                    Swal.fire({
                                        text: "You have successfully logged in!",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                        },
                                    }).then(function (result) {
                                        if (result.isConfirmed) {
                                            t.querySelector(
                                                '[name="email"]'
                                            ).value = "";
                                            t.querySelector(
                                                '[name="password"]'
                                            ).value = "";
                                        }
                                        window.location.href = "dashboard.php";
                                    });
                                }, 2000);
                            } else {
                                Swal.fire({
                                    text: "Login gagal! Ulangi login atau tunggu sampai beberapa saat!",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                }).then(function (result) {
                                    window.location.reload();
                                });
                            }
                        },
                        error: function (error) {
                            console.error("Error:", error);
                        },
                    });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
