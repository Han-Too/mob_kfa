
for (var i = 0; i < document.getElementById("total").value; i++) {
    // $("#modalAddUser_btn").click(function (e) {

    $("#modalDeleteUser_form"+i).on("submit", function (e) {
        e.preventDefault();
        let form = $("#modalDeleteUser_form"+i)[0];
        var token = $('meta[name="csrf-token"]').attr("content");
        var data = $(this).serialize();
        var usertoken = $("#token"+i).val();

        if ($("#alasan-"+i).val() == "") {
            document.getElementById("alasan-"+i).classList.add("is-invalid");
        }
        var alasan = document.getElementById("alasan").value;
        // var alasan = $("#alasan"+i).val();
        var xc = $("#usertoken").val();
        console.log(alasan);
        console.log("usertoken");

        $.ajax({
            url: "/users/delete/"+usertoken,
            type: "POST",
            data: {
                alasan: $("#alasan-"+i).val(),
            },
            // dataType: "JSON",
            success: function (response) {
                console.log(data);
                if (response.status == false) {
                    Swal.fire({
                        text: "Mohon Perhatikan Data!",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        },
                    });
                } else {
                    Swal.fire({
                        text: response.message,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        },
                    }).then(function (t) {
                        if (t.isConfirmed) {
                            window.location.reload();
                        }
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    text: "Sorry, looks like there are some errors detected, please try again.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                });
            },
        });
    });
}
