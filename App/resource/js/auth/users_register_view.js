$(document).ready(function() {
    $('#form-users-register').submit(function(e) {
        e.preventDefault();

        let register_data = new FormData($(this)[0]);

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../../../../App/Controller/auth/user_request_register.php",
            data: register_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {

                if (response.status == 200) {

                    Swal.fire(
                        'สำเร็จ',
                        'ลงทะเบียนสำเร็จ',
                        'success'
                    ).then(function(result) {
                        setTimeout(function() {
                            window.location.href = "/doc_system_project/index.php?register=success";
                        }, 1000);
                    });

                } else {

                    Swal.fire(
                        'สำเร็จ',
                        'ลงทะเบียนไม่สำเร็จ',
                        'error'
                    ).then(function(result) {
                        window.location.reload();
                    });
                }

            },
            error: function(error) {
                console.log(error);
            }
        });

    });
});