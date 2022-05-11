$(document).ready(function() {

    const user_id = window.localStorage.getItem('user_id');
    const username = window.localStorage.getItem('username');
    const password = window.localStorage.getItem('password');

    if (user_id == null) {
        window.location.href = "/doc_system_project/index.php";
    }

    loadMenuUsers(user_id);
    loadDocToTable(user_id);
    loadUsersDataToModalUpdate(user_id);

    $('#doc_sender').val(username);

    $('#form-upload').submit(function(e) {
        e.preventDefault();

        let form_upload = new FormData($(this)[0]);
        form_upload.append("user_id", user_id);

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../../../../App/Controller/auth/user_request_upload.php",
            data: form_upload,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {

                if (response.status == 200) {

                    Swal.fire(
                        'สำเร็จ',
                        'บันทึกการอัปโหลดสำเร็จ',
                        'success'
                    ).then(function(result) {
                        window.location.reload();
                    });

                } else {

                    Swal.fire(
                        'ผิดพลาด',
                        'บันทึกการอัปโหลดไม่สำเร็จ',
                        'error'
                    ).then(function(result) {
                        window.location.reload();
                    });
                }
            }
        });
    });

    $('#form-search-doc').submit(function(e) {
        e.preventDefault();

        let search = $('#search-document').val();

        if (search != "" && search != null) {

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../../../App/Controller/auth/user_request_search_doc.php",
                data: {
                    search: search,
                    user_id: user_id
                },
                success: function(resp_search) {

                    let tbody = ``;
                    let number = 1;

                    if (resp_search.length == 0) {

                        Swal.fire(
                            'ไม่พบข้อมูล',
                            'ไม่พบเอกสารที่ต้องการค้นหา กรุณาลองใหม่อีกครั้ง!',
                            'question'
                        ).then(function(result) {
                            $('#form-search-doc')[0].reset();
                            $('#search-display-doc').empty();
                        });

                    } else {

                        resp_search.forEach(function(searchs) {

                            tbody = `
                                <tr>
                                    <td>${number}</td>
                                    <td>${searchs.doc_name}</td>
                                    <td>${searchs.doc_type}</td>
                                    <td>${searchs.doc_sender}</td>
                                    <td>${searchs.doc_recipient}</td>
                                    <td>${searchs.doc_qty}</td>
                                    <td>${searchs.doc_com}</td>
                                    <td>${searchs.date_upload}</td>
                                    <td><a href="../../../../App/public/auth_upload_file/${searchs.doc_file}" target="_blank">download</a></td>
                                </tr>
                            `;

                            $('#search-display-doc').append(tbody);
                            number++;

                        });

                        $('#form-search-doc')[0].reset();

                    }
                }
            });

        } else {

            Swal.fire(
                'คำเตือน',
                'กรุณากรอกข้อมูลที่ต้องการค้นหา',
                'warning'
            ).then(function(result) {
                $('#form-search-doc')[0].reset();
                $('#search-display-doc').empty();
            });
        }

        $('#search-display-doc').empty();

    });

    $('#reset-doc').click(function(e) {
        e.preventDefault();
        $('#form-search-doc')[0].reset();
        $('#search-display-doc').empty();
        $('#search-document').focus();
    });

    $('#form-edit-profile').submit(function(e) {
        e.preventDefault();

        let update_profile = new FormData($(this)[0]);
        update_profile.append("user_id", window.localStorage.getItem("user_id"));

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../../../../App/Controller/auth/user_request_updateProfile.php",
            data: update_profile,
            cache: false,
            contentType: false,
            processData: false,
            success: function(edit_profile) {
                console.log(edit_profile);

                if (edit_profile.status == 200) {

                    Swal.fire(
                        'สำเร็จ',
                        'เเก้ไขโปรไฟล์สำเร็จ',
                        'success'
                    ).then(function(result) {
                        window.location.reload();
                    });
                }
            }
        });
    });

    countFileByID();
});

function loadMenuUsers(user_id) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../../../App/Controller/auth/user_request_loadManuUsers.php",
        data: {
            user_id: user_id
        },
        success: function(menu) {

            let html = ``;

            menu.forEach(function(menus) {

                html = `
                     <li class="list-group-item active" aria-current="true">สถานะ : สมาชิก</li> 
                     <li class="list-group-item"><img src="../../../../App/public/auth_upload_img/${menus.imgs}" class="img-fluid rounded-circle" style="width: 80px; height: 80px;"></li>
                     <li class="list-group-item">ชื่อ-นามสกุล ${menus.fname} ${menus.lname}</li>
                     <button type="button" class="list-group-item list-group-item-action" onclick="openModalEditProfile()">ตั้งค่าโปรไฟล์</button> 
                     <button type="button" class="list-group-item list-group-item-action" onclick="logout()">ออกจากระบบ</button>            
                `;

                $('#menu-users').append(html);

            });
        }
    });
}

function loadUsersDataToModalUpdate(user_id) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../../../App/Controller/auth/user_request_loadManuUsers.php",
        data: {
            user_id: user_id
        },
        success: function(update) {

            if (update.length != 0) {

                update.forEach(function(updates) {
                    $('#username').val(updates.username);
                    $('#password').val(updates.password);
                    $('#fname').val(updates.fname);
                    $('#lname').val(updates.lname);
                    $('#sex').val(updates.sex);
                    $('#phone').val(updates.phone);
                    $('#email').val(updates.email);
                    $('#img-update').attr('src', `../../../../App/public/auth_upload_img/${updates.imgs}`);
                });
            }
        }
    });
}

function openModalEditProfile() {
    $('#modalEdit-Profile').modal('show');
}

function loadDocToTable(user_id) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../../../App/Controller/auth/user_request_loadDocument.php",
        data: {
            user_id: user_id
        },
        success: function(doc) {

            let tbody = ``;
            let number = 1;

            if (doc.length != 0) {

                doc.forEach(function(docs) {

                    tbody = `
                        <tr>
                            <td>${number}</td>
                            <td>${docs.doc_name}</td>
                            <td>${docs.doc_type}</td>
                            <td>${docs.doc_sender}</td>
                            <td>${docs.doc_recipient}</td>
                            <td>${docs.doc_qty}</td>
                            <td>${docs.doc_com}</td>
                            <td>${docs.date_upload}</td> 
                            <td><a href="../../../../App/public/auth_upload_file/${docs.doc_file}" target="_blank">download</a></td>
                        </tr>
                    `;

                    $('#display-doc').append(tbody);
                    number++;

                });

            } else {

                tbody = `
                    <tr>
                        <td colspan="9">ไม่พบข้อมูลเอกสาร</td>
                    </tr>
                `;

                $('#display-doc').append(tbody);
                number++;

            }

        }
    });
}

function countFileByID() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../../../App/Controller/auth/user_request_chart.php",
        data: {
            user_id: window.localStorage.getItem('user_id')
        },
        success: function(chartData) {
            ChartObject.config("myChart", "bar", [
                "เอกสารทั้งหมด",
            ], "สถิติ", [
                "rgba(41, 140, 255, 0.5)",
            ], [
                "rgba(54, 162, 235, 1)",
            ], chartData);
        }
    });

}

function logout() {
    Swal.fire(
        'สำเร็จ',
        'ออกจากระบบสำเร็จ',
        'success'
    ).then(function(result) {
        window.localStorage.removeItem('user_id');
        window.location.href = "/doc_system_project/index.php?logout=success";
    });
}