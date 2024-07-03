$(document).ready(function () {
    $("body,html").animate({ scrollTop: 0 }, 800);
});

$("#updateDetail_form").on("submit", function (event) {
    event.preventDefault();
    var token = $('meta[name="csrf-token"]').attr("content");
    var formData = new FormData(this);
    // console.log(formData);
    $.ajax({
        headers: { "X-CSRF-TOKEN": token },
        type: "POST",
        data: formData,
        url: "/applicants/detail/update",
        dataType: "JSON",
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            swal.showLoading();
        },
        success: function (data) {
            swal.hideLoading();
            if (data.status === true) {
                swal.fire({
                    text: data.message,
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary",
                    },
                }).then(function () {
                    Promise.resolve()
                        .then(function () {
                            window.location.reload();
                        })
                        .then(function () {
                            window.scrollTo(0, 0);
                        });
                });
            } else {
                swal.fire({
                    html: data.message,
                    icon: "info",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary",
                    },
                }).then(function () {});
            }
        },
    });
});
