$(document).ready(function() {

    const admin_id = window.localStorage.getItem('admin_id');

    if (admin_id == null) {
        window.location.href = "/doc_system_project/index.php";
    }

    loadMenuAdmin(admin_id);
    loadDocToTable();
    loadDocToTable_Update();
    getDocToDelete();
    loadUserToTable();

    $('#form-edit-doc').submit(function(e) {
        e.preventDefault();

        let formUpdate = new FormData($(this)[0]);

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../../../../App/Controller/admin/admin_request_updateDocumentAll.php",
            data: formUpdate,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp_updateFile) {

                if (resp_updateFile) {
                    Swal.fire(
                        'สำเร็จ',
                        'เเก้ไขข้อมูลสำเร็จ',
                        'success'
                    ).then(function(result) {
                        window.location.reload();
                    });
                }
            }
        });
    });

    $('#form-search-doc').submit(function(e) {
        e.preventDefault();

        let search_doc_name = $('#search_doc_name').val();

        if (search_doc_name != "" && search_doc_name != null) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../../../App/Controller/admin/admin_request_search_doc.php",
                data: {
                    search: search_doc_name
                },
                success: function(resp_search) {

                    let tbody = ``;
                    let number = 1;

                    if (resp_search.length != 0) {

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

                    } else {

                        Swal.fire(
                            'ไม่พบข้อมูล',
                            'ไม่พบเอกสารที่ต้องการค้นหา กรุณาลองใหม่อีกครั้ง!',
                            'question'
                        ).then(function(result) {
                            $('#form-search-doc')[0].reset();
                            $('#search-display-doc').empty();
                        });

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
        $('#search_doc_name').focus();
    });

    $('#form-search-users').submit(function(e) {
        e.preventDefault();

        let fname = $('#search_fname').val();

        if (fname != "" && fname != null) {

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../../../App/Controller/admin/admin_request_searchUsers.php",
                data: {
                    fname: fname
                },
                success: function(resp_search) {

                    let tbody = ``;
                    let rowNum = 1;

                    if (resp_search.length != 0) {

                        resp_search.forEach(function(searchs) {

                            tbody = `
                                <tr>
                                    <td>${rowNum}</td>
                                    <td>${searchs.username}</td>
                                    <td>${searchs.password}</td>
                                    <td>${searchs.fname}</td>
                                    <td>${searchs.lname}</td>
                                    <td>${searchs.sex}</td>
                                    <td>${searchs.phone}</td>
                                    <td>${searchs.email}</td>
                                    <td>${searchs.regis_date}</td>
                                    <td><img src="../../../../App/public/auth_upload_img/${searchs.imgs}" class="img-fluid border border-dark rounded-circle" style="width: 40px; height: 40px;"></td>
                                </tr>
                            `;

                            $('#display-searchUsers').append(tbody);
                            rowNum++;

                        });

                        $('#form-search-users')[0].reset();

                    } else {

                        Swal.fire(
                            'ไม่พบข้อมูล',
                            'ไม่พบเอกสารที่ต้องการค้นหา กรุณาลองใหม่อีกครั้ง!',
                            'question'
                        ).then(function(result) {
                            $('#form-search-users')[0].reset();
                            $('#display-searchUsers').empty();
                        });
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

        $('#display-searchUsers').empty();
    });

    $('#reset-searchUsers').click(function(e) {
        e.preventDefault();
        $('#form-search-users')[0].reset();
        $('#display-searchUsers').empty();
        $('#search_fname').focus();
    });

    $('#form-search-doc-edit').submit(function(e) {
        e.preventDefault();

        let search = $('#search-doc-to-edit').val();

        if (search != "" && search != null) {

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../../../App/Controller/admin/admin_request_search_doc.php",
                data: {
                    search: search
                },
                success: function(resp_search) {

                    let tbody = ``;
                    let rowNum = 1;

                    if (resp_search.length != 0) {

                        resp_search.forEach(function(searchs) {

                            tbody = `
                                <tr>
                                    <td>${rowNum}</td>
                                    <td>${searchs.doc_name}</td>
                                    <td>${searchs.doc_type}</td>
                                    <td>${searchs.doc_sender}</td>
                                    <td>${searchs.doc_recipient}</td>
                                    <td>${searchs.doc_qty}</td>
                                    <td>${searchs.doc_com}</td>
                                    <td>${searchs.date_upload}</td> 
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-doc" onclick="editDocByID(${searchs.doc_id})">
                                            เเก้ไข
                                        </button>
                                    </td>
                                </tr>
                            `;

                            $('#search-display-doc-edit').append(tbody);
                            rowNum++;

                        });

                        $('#form-search-doc-edit')[0].reset();

                    } else {
                        Swal.fire(
                            'ไม่พบข้อมูล',
                            'ไม่พบเอกสารที่ต้องการค้นหา กรุณาลองใหม่อีกครั้ง!',
                            'question'
                        ).then(function(result) {
                            $('#form-search-doc-edit')[0].reset();
                            $('#search-display-doc-edit').empty();
                        });
                    }
                }
            });

        } else {

            Swal.fire(
                'คำเตือน',
                'กรุณากรอกข้อมูลที่ต้องการค้นหา',
                'warning'
            ).then(function(result) {
                $('#form-search-doc-edit')[0].reset();
                $('#search-display-doc-edit').empty();
            });
        }

        $('#search-display-doc-edit').empty();

    });

    $('#reset-doc-edit').click(function(e) {
        e.preventDefault();
        $('#form-search-doc-edit')[0].reset();
        $('#search-display-doc-edit').empty();
        $('#search-doc-to-edit').focus();
    });

    $('#form-search-doc-delete').submit(function(e) {
        e.preventDefault();

        let search = $('#search-doc-to-delete').val();

        if (search != "" && search != null) {

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../../../App/Controller/admin/admin_request_search_doc.php",
                data: {
                    search: search
                },
                success: function(resp_search) {

                    let tbody = ``;
                    let rowNum = 1;

                    if (resp_search.length != 0) {

                        resp_search.forEach(function(searchs) {

                            tbody = `
                                <tr>
                                    <td>${rowNum}</td>
                                    <td>${searchs.doc_name}</td>
                                    <td>${searchs.doc_type}</td>
                                    <td>${searchs.doc_sender}</td>
                                    <td>${searchs.doc_recipient}</td>
                                    <td>${searchs.doc_qty}</td>
                                    <td>${searchs.doc_com}</td>
                                    <td>${searchs.date_upload}</td> 
                                    <td><button type="button" class="btn btn-danger btn-sm" onclick="deleteDoc(${searchs.doc_id})">ลบ</button></td> 
                                </tr>
                            `;

                            $('#search-display-doc-delete').append(tbody);
                            rowNum++;

                        });

                        $('#form-search-doc-delete')[0].reset();

                    } else {
                        Swal.fire(
                            'ไม่พบข้อมูล',
                            'ไม่พบเอกสารที่ต้องการค้นหา กรุณาลองใหม่อีกครั้ง!',
                            'question'
                        ).then(function(result) {
                            $('#form-search-doc-delete')[0].reset();
                            $('#search-display-doc-edit').empty();
                        });
                    }
                }
            });

        } else {

            Swal.fire(
                'คำเตือน',
                'กรุณากรอกข้อมูลที่ต้องการค้นหา',
                'warning'
            ).then(function(result) {
                $('#form-search-doc-delete')[0].reset();
                $('#search-display-doc-delete').empty();
            });
        }

        $('#search-display-doc-delete').empty();
    });

    $('#reset-doc-delete').click(function(e) {
        e.preventDefault();
        $('#form-search-doc-delete')[0].reset();
        $('#search-display-doc-delete').empty();
        $('#search-doc-to-delete').focus();
    });

    chartBottomMenu();
});

function editDocByID(doc_id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../../../App/Controller/admin/admin_request_editDocument.php",
        data: {
            doc_id: doc_id
        },
        success: function(docEdit) {

            if (docEdit.length != 0) {

                docEdit.forEach(function(docUd) {
                    $('#doc_id').val(docUd.doc_id);
                    $('#doc_name').val(docUd.doc_name);
                    $('#doc_type').val(docUd.doc_type);
                    $('#show-odd-file').val(docUd.doc_file);
                    $('#doc_sender').val(docUd.doc_sender);
                    $('#doc_recipient').val(docUd.doc_recipient);
                    $('#doc_com').val(docUd.doc_com);
                });

            } else {

                $('#doc_name').val('ไม่พบข้อมูล');
                $('#doc_type').val('ไม่พบข้อมูล');
                $('#show-odd-file').val('ไม่พบข้อมูล');
                $('#doc_sender').val('ไม่พบข้อมูล');
                $('#doc_recipient').val('ไม่พบข้อมูล');
                $('#doc_com').val('ไม่พบข้อมูล');
            }
        }
    });
}

function loadMenuAdmin(admin_id) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../../../App/Controller/admin/admin_request_loadManuAdmin.php",
        data: {
            admin_id: admin_id
        },
        success: function(menu) {

            let html = ``;

            menu.forEach(function(menus) {

                html = `
                    <li class="list-group-item active" aria-current="true">โปรไฟล์ สถานะ : admin</li> 
                    <li class="list-group-item"><img src="../../../../App/public/admin_upload_img/${menus.admin_img}" class="img-fluid rounded-circle" style="width: 60%; height: 60%;"></li>
                    <li class="list-group-item">ชื่อ-นามสกุล ${menus.admin_name} ${menus.admin_pass}</li>
                    <button type="button" class="list-group-item list-group-item-action" onclick="logout()">ออกจากระบบ</button>   
                `;

                $('#menu-admin').append(html);

            });
        }
    });
}

function loadDocToTable() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../../../App/Controller/admin/admin_request_loadDocument.php",
        success: function(doc) {

            let tbody = ``;
            let number = 1;

            $('#score-doc').html(doc.length);

            if (doc.length != 0) {

                doc.forEach(function(docs) {

                    tbody = `
                        <tr>
                            <td>${number}</td>
                            <td>${docs.doc_name}</td>
                            <td>${docs.doc_type}</td>
                            <td class="text-primary">${docs.doc_sender}</td>
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

function loadDocToTable_Update() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../../../App/Controller/admin/admin_request_loadDocument.php",
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
                            <td class="text-primary">${docs.doc_sender}</td>
                            <td>${docs.doc_recipient}</td>
                            <td>${docs.doc_qty}</td>
                            <td>${docs.doc_com}</td>
                            <td>${docs.date_upload}</td> 
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-doc" onclick="editDoc(${docs.doc_id})">
                                    เเก้ไข
                                </button>
                            </td>
                        </tr>
                    `;

                    $('#display-update-doc').append(tbody);
                    number++;

                });

            } else {

                tbody = `
                    <tr>
                        <td colspan="9">ไม่พบข้อมูลเอกสาร</td>
                    </tr>
                `;

                $('#display-update-doc').append(tbody);
                number++;

            }
        }
    });
}

function editDoc(doc_id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../../../App/Controller/admin/admin_request_editDocument.php",
        data: {
            doc_id: doc_id
        },
        success: function(docEdit) {

            if (docEdit.length != 0) {

                docEdit.forEach(function(docUd) {
                    $('#doc_id').val(docUd.doc_id);
                    $('#doc_name').val(docUd.doc_name);
                    $('#doc_type').val(docUd.doc_type);
                    $('#show-odd-file').val(docUd.doc_file);
                    $('#doc_sender').val(docUd.doc_sender);
                    $('#doc_recipient').val(docUd.doc_recipient);
                    $('#doc_com').val(docUd.doc_com);
                });

            } else {

                $('#doc_name').val('ไม่พบข้อมูล');
                $('#doc_type').val('ไม่พบข้อมูล');
                $('#show-odd-file').val('ไม่พบข้อมูล');
                $('#doc_sender').val('ไม่พบข้อมูล');
                $('#doc_recipient').val('ไม่พบข้อมูล');
                $('#doc_com').val('ไม่พบข้อมูล');
            }
        }
    });
}

function getDocToDelete() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../../../App/Controller/admin/admin_request_deleteDocument.php",
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
                            <td class="text-primary">${docs.doc_sender}</td>
                            <td>${docs.doc_recipient}</td>
                            <td>${docs.doc_qty}</td>
                            <td>${docs.doc_com}</td>
                            <td>${docs.date_upload}</td> 
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteDoc(${docs.doc_id})">ลบ</button>
                            </td> 
                        </tr>
                    `;

                    $('#display-delete-doc').append(tbody);
                    number++;

                });

            } else {

                tbody = `
                    <tr>
                        <td colspan="9">ไม่พบข้อมูลเอกสาร</td>
                    </tr>
                `;

                $('#display-delete-doc').append(tbody);
                number++;

            }

        }
    });
}

function deleteDoc(doc_id) {
    Swal.fire({
        title: 'คำเตือน',
        text: `ต้องการลบเอกสารรหัส ${doc_id} หรือไม่`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {

        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../../../App/Controller/admin/admin_request_deleteDocumentByID.php",
                data: {
                    doc_id: doc_id
                },
                success: function(response) {
                    if (response.status == 200) {

                        Swal.fire(
                            'สำเร็จ',
                            'ลบข้อมูลสำเร็จ',
                            'success'
                        ).then(function(result) {
                            window.location.reload();
                        });

                    } else {

                        Swal.fire(
                            'ผิดพลาด',
                            'ลบข้อมูลไม่สำเร็จ',
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
        }
    });
}

function loadUserToTable() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../../../App/Controller/admin/admin_request_showAllUsers.php",
        success: function(resp_users) {

            let rowNum = 1;
            let tbody = ``;

            if (resp_users.length != 0) {

                resp_users.forEach(function(users) {

                    tbody = `
                            <tr>
                                <td>${rowNum}</td>
                                <td>${users.fname}</td>
                                <td>${users.lname}</td>
                                <td>${users.sex}</td>
                                <td>${users.phone}</td>
                                <td>${users.email}</td>
                                <td>${users.regis_date}</td>
                                <td><img src="../../../../App/public/auth_upload_img/${users.imgs}" class="img-fluid border border-dark rounded-circle" style="width: 40px; height: 40px;"></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#users-data-modal" onclick="btnSeeMoreUsers(${users.user_id})">
                                        ดูเพิ่มเติม
                                    </button>
                                </td>
                            </tr>
                    `;

                    $('#display-users-data').append(tbody);
                    rowNum++;

                });

            }
        }
    });
}

function btnSeeMoreUsers(user_id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../../../App/Controller/admin/admin_request_getUsers.php",
        data: {
            user_id: user_id,
        },
        success: function(resp_usersData) {

            if (resp_usersData.length != 0) {

                resp_usersData.forEach(function(usersData) {

                    $('#users-imgs').attr('src', `../../../../App/public/auth_upload_img/${usersData.imgs}`);
                    $('#username_dis').val(usersData.username);
                    $('#password_dis').val(usersData.password);
                    $('#fname_dis').val(usersData.fname);
                    $('#lname_dis').val(usersData.lname);
                    $('#sex_dis').val(usersData.sex);
                    $('#phone_dis').val(usersData.phone);
                    $('#email_dis').val(usersData.email);
                    $('#regis_date_dis').val(usersData.regis_date);

                });
            }
        }
    });
}

function chartBottomMenu() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../../../App/Controller/admin/admin_request_getToChart.php",
        success: function(chartData) {

            let resultResp = [].concat(chartData[0], chartData[1]);

            ChartObject.config("myChart", "bar", [
                "เอกสารทั้งหมด",
                "สมาชิกทั้งหมด",
            ], "สถิติ", [
                "rgba(41, 140, 255, 0.5)",
                "rgba(255, 206, 86, 0.2)",
            ], [
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
            ], resultResp);
        }
    });
}

function logout() {
    Swal.fire(
        'สำเร็จ',
        'ออกจากระบบสำเร็จ',
        'success'
    ).then(function(result) {
        window.localStorage.removeItem('admin_id');
        window.location.href = "/doc_system_project/index.php?logout=success";
    });
}