$(document).ready(function() {

    $('#form-admin-login').submit(function(e) {
        e.preventDefault();

        let admin_name = $('#admin_name').val();
        let admin_pass = $('#admin_pass').val();

        if (admin_name.length != 0 && admin_pass.length != 0) {

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../../../App/Controller/admin/admin_request_login.php",
                data: {
                    admin_name: admin_name,
                    admin_pass: admin_pass
                },
                success: function(login) {

                    try {

                        if (login[0].admin_name == admin_name && login[0].admin_pass == admin_pass) {

                            window.localStorage.setItem('admin_id', login[0].admin_id);
                            window.localStorage.setItem('admin_name', login[0].admin_name);
                            window.localStorage.setItem('admin_pass', login[0].admin_pass);

                            Swal.fire(
                                'สำเร็จ',
                                'เข้าสู่ระบบ',
                                'success'
                            ).then(function(result) {
                                window.location.href = `../../../../App/resource/Views/admin/admin_page_view.php?login=success`;
                            });

                        }

                    } catch (err) {

                        Swal.fire(
                            'ผิดพลาด',
                            'admin name หรือ password ไม่ถูกต้อง',
                            'error'
                        ).then(function(result) {
                            window.location.reload();
                        });

                    }
                }
            });

        } else {

            Swal.fire(
                'คำเตือน',
                'กรุณากรอกข้อมูลให้ครบถ้วน',
                'warning'
            ).then(function(result) {
                window.location.reload();
            });

        }

    });

});