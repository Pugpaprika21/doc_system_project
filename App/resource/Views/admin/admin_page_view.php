<?php require_once('../../../../App/bootstrap/header.php'); ?>
<link rel="stylesheet" href="../../../../App/resource/css/admin/admin_page_view.css">
<div class="d-flex justify-content-center">
    <nav class="navbar navbar-expand-lg navbar-light" style="width: 100rem; background-color: #425D8D;">
        <div class="container-fluid">
            <a class="navbar-brand text-white">ระบบคลังเอกสาร</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                            </svg> ผู้ดูเเลระบบ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" onclick="logout()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                            </svg> ออกจากระบบ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-6 col-md-2">
            <div class="list-group text-center">
                <ul class="list-group">
                    <div class="text-center" id="menu-admin">
                    </div>
                </ul>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <canvas id="myChart" height="490"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-10">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active position-relative" id="pills-show-doc-tab" data-bs-toggle="pill" data-bs-target="#pills-doc" type="button" role="tab" aria-controls="pills-doc" aria-selected="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg> เอกสารทั้งหมด
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="score-doc">
                                    99+
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-manage-doc-tab" data-bs-toggle="pill" data-bs-target="#pills-manage-doc-date" type="button" role="tab" aria-controls="pills-manage-doc-date" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filetype-doc" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5Zm-7.839 9.166v.522c0 .256-.039.47-.117.641a.861.861 0 0 1-.322.387.877.877 0 0 1-.469.126.883.883 0 0 1-.471-.126.868.868 0 0 1-.32-.386 1.55 1.55 0 0 1-.117-.642v-.522c0-.257.04-.471.117-.641a.868.868 0 0 1 .32-.387.868.868 0 0 1 .471-.129c.176 0 .332.043.469.13a.861.861 0 0 1 .322.386c.078.17.117.384.117.641Zm.803.519v-.513c0-.377-.068-.7-.205-.972a1.46 1.46 0 0 0-.589-.63c-.254-.147-.56-.22-.917-.22-.355 0-.662.073-.92.22a1.441 1.441 0 0 0-.589.627c-.136.271-.205.596-.205.975v.513c0 .375.069.7.205.973.137.271.333.48.59.627.257.144.564.216.92.216.357 0 .662-.072.916-.216.256-.147.452-.356.59-.627.136-.274.204-.598.204-.973ZM0 11.926v4h1.459c.402 0 .735-.08.999-.238a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.59-.68c-.263-.156-.598-.234-1.004-.234H0Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.141 1.141 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082H.79V12.57Zm7.422.483a1.732 1.732 0 0 0-.103.633v.495c0 .246.034.455.103.627a.834.834 0 0 0 .298.393.845.845 0 0 0 .478.131.868.868 0 0 0 .401-.088.699.699 0 0 0 .273-.248.8.8 0 0 0 .117-.364h.765v.076a1.268 1.268 0 0 1-.226.674c-.137.194-.32.345-.55.454a1.81 1.81 0 0 1-.786.164c-.36 0-.664-.072-.914-.216a1.424 1.424 0 0 1-.571-.627c-.13-.272-.194-.597-.194-.976v-.498c0-.379.066-.705.197-.978.13-.274.321-.485.571-.633.252-.149.556-.223.911-.223.219 0 .421.032.607.097.187.062.35.153.489.272a1.326 1.326 0 0 1 .466.964v.073H9.78a.85.85 0 0 0-.12-.38.7.7 0 0 0-.273-.261.802.802 0 0 0-.398-.097.814.814 0 0 0-.475.138.868.868 0 0 0-.301.398Z" />
                                </svg> จัดการเอกสาร
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-show-users-tab" data-bs-toggle="pill" data-bs-target="#pills-show-users-data" type="button" role="tab" aria-controls="pills-show-users-data" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                </svg> สมาชิกในระบบ
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-doc" role="tabpanel" aria-labelledby="pills-show-doc-tab">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#search-doc">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg> ค้นหา
                                </button>
                            </div>
                            <div style="height:504px; overflow:auto;">
                                <table class="table table-hover text-center">
                                    <thead class="text-white" style="background-color: #474B8C;">
                                        <tr>
                                            <td>#</td>
                                            <td>ชื่อเอกสาร</td>
                                            <td>ประเภทเอกสาร</td>
                                            <td>ผู้ส่ง</td>
                                            <td>ผู้รับ</td>
                                            <td>จำนวน</td>
                                            <td>หมายเหตุ</td>
                                            <td>ว-ด-ป อัปโหลด</td>
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-download mb-1" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                </svg> ดาวน์โหลด
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody id="display-doc">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-manage-doc-date" role="tabpanel" aria-labelledby="pills-manage-doc-tab">
                            <ul class="nav nav-pills justify-content-end mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-update-doc-tab" data-bs-toggle="pill" data-bs-target="#pills-update" type="button" role="tab" aria-controls="pills-update" aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg> เเก้ไขเอกสาร
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-delete-tab" data-bs-toggle="pill" data-bs-target="#pills-delete" type="button" role="tab" aria-controls="pills-delete" aria-selected="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-folder-x" viewBox="0 0 16 16">
                                            <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zm6.339-1.577A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" />
                                            <path d="M11.854 10.146a.5.5 0 0 0-.707.708L12.293 12l-1.146 1.146a.5.5 0 0 0 .707.708L13 12.707l1.146 1.147a.5.5 0 0 0 .708-.708L13.707 12l1.147-1.146a.5.5 0 0 0-.707-.708L13 11.293l-1.146-1.147z" />
                                        </svg> ลบเอกสาร
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-update" role="tabpanel" aria-labelledby="pills-update-doc-tab">
                                    <div style="height:500px; overflow:auto;">
                                        <table class="table table-hover text-center">
                                            <thead class="text-white" style="background-color: #474B8C;">
                                                <tr>
                                                    <td>#</td>
                                                    <td>ชื่อเอกสาร</td>
                                                    <td>ประเภทเอกสาร</td>
                                                    <td>ผู้ส่ง</td>
                                                    <td>ผู้รับ</td>
                                                    <td>จำนวน</td>
                                                    <td>หมายเหตุ</td>
                                                    <td>ว-ด-ป อัปโหลด</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#search-doc-as-edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                            </svg> ค้นหา
                                                        </button>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody id="display-update-doc">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-delete" role="tabpanel" aria-labelledby="pills-delete-doc-tab">
                                    <div style="height:500px; overflow:auto;">
                                        <table class="table table-hover text-center">
                                            <thead class="text-white" style="background-color: #474B8C;">
                                                <tr>
                                                    <td>#</td>
                                                    <td>ชื่อเอกสาร</td>
                                                    <td>ประเภทเอกสาร</td>
                                                    <td>ผู้ส่ง</td>
                                                    <td>ผู้รับ</td>
                                                    <td>จำนวน</td>
                                                    <td>หมายเหตุ</td>
                                                    <td>ว-ด-ป อัปโหลด</td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#search-doc-as-delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                            </svg> ค้นหา
                                                        </button>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody id="display-delete-doc">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-show-users-data" role="tabpanel" aria-labelledby="pills-show-users-tab">
                            <div style="height:500px; overflow:auto;">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#search-users">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg> ค้นหา
                                    </button>
                                </div>
                                <table class="table table-hover text-center">
                                    <thead class="text-white" style="background-color: #474B8C;">
                                        <tr>
                                            <td>#</td>
                                            <td>ชื่อ</td>
                                            <td>นามสกุล</td>
                                            <td>เพศ</td>
                                            <td>เบอร์โทร</td>
                                            <td>อีเมล</td>
                                            <td>ว-ด-ป ลงทะเบียน</td>
                                            <td>รูปประจำตัว</td>
                                            <td>ดูเพิ่มเติม</td>
                                        </tr>
                                    </thead>
                                    <tbody id="display-users-data">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="search-doc-as-edit" tabindex="-1" aria-labelledby="search-doc-as-editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #425D8D;">
                <h5 class="modal-title">ค้นหาเอกสาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-end">
                    <form class="d-flex" id="form-search-doc-edit">
                        <input class="form-control me-2" type="search" id="search-doc-to-edit" placeholder="ชื่อเอกสาร" aria-label="Search">
                        <button class="btn btn-primary" type="submit">
                            ค้นหา
                        </button>
                    </form>
                </div>
                <table class="table table-hover mt-3 text-center">
                    <thead class="text-white" style="background-color: #474B8C;">
                        <tr>
                            <td>#</td>
                            <td>ชื่อเอกสาร</td>
                            <td>ประเภทเอกสาร</td>
                            <td>ผู้ส่ง</td>
                            <td>ผู้รับ</td>
                            <td>จำนวน</td>
                            <td>หมายเหตุ</td>
                            <td>ว-ด-ป อัปโหลด</td>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg> เเก้ไข
                            </td>
                        </tr>
                    </thead>
                    <tbody id="search-display-doc-edit">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" id="reset-doc-edit">รีเซต</button>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div class="modal fade" id="search-doc-as-delete" tabindex="-1" aria-labelledby="search-doc-as-deleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #425D8D;">
                <h5 class="modal-title">ค้นหาเอกสาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-end">
                    <form class="d-flex" id="form-search-doc-delete">
                        <input class="form-control me-2" type="search" id="search-doc-to-delete" placeholder="ชื่อเอกสาร" aria-label="Search">
                        <button class="btn btn-primary" type="submit">
                            ค้นหา
                        </button>
                    </form>
                </div>
                <table class="table table-hover mt-3 text-center">
                    <thead class="text-white" style="background-color: #474B8C;">
                        <tr>
                            <td>#</td>
                            <td>ชื่อเอกสาร</td>
                            <td>ประเภทเอกสาร</td>
                            <td>ผู้ส่ง</td>
                            <td>ผู้รับ</td>
                            <td>จำนวน</td>
                            <td>หมายเหตุ</td>
                            <td>ว-ด-ป อัปโหลด</td>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-folder-x" viewBox="0 0 16 16">
                                    <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zm6.339-1.577A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" />
                                    <path d="M11.854 10.146a.5.5 0 0 0-.707.708L12.293 12l-1.146 1.146a.5.5 0 0 0 .707.708L13 12.707l1.146 1.147a.5.5 0 0 0 .708-.708L13.707 12l1.147-1.146a.5.5 0 0 0-.707-.708L13 11.293l-1.146-1.147z" />
                                </svg> ลบ
                            </td>
                        </tr>
                    </thead>
                    <tbody id="search-display-doc-delete">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" id="reset-doc-delete">รีเซต</button>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div class="modal fade" id="modal-edit-doc" tabindex="-1" aria-labelledby="search-docLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <form id="form-edit-doc" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #425D8D;">
                    <h5 class="modal-title">เเก้ไขเอกสาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 col-md-8">
                            <div class="mb-3">
                                <label for="doc_id" class="form-label-doc_id mb-2">รหัสเอกสาร</label>
                                <input type="text" class="form-control" id="doc_id" name="doc_id" aria-label="readonly input example" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="doc-name" class="form-label-doc-name mb-2">ชื่อเอกสาร</label>
                                <input type="text" class="form-control" id="doc_name" name="doc_name" placeholder="ชื่อเอกสาร" required>
                            </div>
                            <div class="mb-3">
                                <label for="doc_type" class="form-label-doc_type mb-2">ประเภทเอกสาร</label>
                                <input type="text" class="form-control" id="doc_type" name="doc_type" placeholder="ประเภทเอกสาร" required>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label-doc_file mb-2">เลือกไฟล์</label>
                                <input class="form-control" type="file" id="formFile" name="doc_file" required>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label-doc_file mb-2">ไฟล์เอกสารเก่า</label>
                                <input type="text" class="form-control" id="show-odd-file" aria-label="readonly input example" readonly>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="doc_sender" class="form-label-doc_sender mb-2">ผู้ส่งเอกสาร</label>
                                <input type="text" class="form-control" id="doc_sender" name="doc_sender" placeholder="ผู้ส่งเอกสาร" required>
                            </div>
                            <div class="mb-3">
                                <label for="doc_recipient" class="form-label-doc_recipient mb-2">ผู้รับเอกสาร</label>
                                <input type="text" class="form-control" id="doc_recipient" name="doc_recipient" placeholder="ผู้รับเอกสาร" required>
                            </div>
                            <div class="mb-3">
                                <label for="doc_com" class="form-label-doc_com mb-2">หมายเหตุ</label>
                                <textarea class="form-control" id="doc_com" name="doc_com" rows="3">ไม่ระบุ</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">เเก้ไข</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="search-doc" tabindex="-1" aria-labelledby="search-docLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #425D8D;">
                <h5 class="modal-title">ค้นหาเอกสาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-end">
                    <form class="d-flex" id="form-search-doc">
                        <input class="form-control me-2" type="search" id="search_doc_name" placeholder="ชื่อเอกสาร" aria-label="Search">
                        <button class="btn btn-primary" type="submit">
                            ค้นหา
                        </button>
                    </form>
                </div>
                <table class="table table-hover mt-3 text-center">
                    <thead class="text-white" style="background-color: #474B8C;">
                        <tr>
                            <td>#</td>
                            <td>ชื่อเอกสาร</td>
                            <td>ประเภทเอกสาร</td>
                            <td>ผู้ส่ง</td>
                            <td>ผู้รับ</td>
                            <td>จำนวน</td>
                            <td>หมายเหตุ</td>
                            <td>ว-ด-ป อัปโหลด</td>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-download mb-1" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg> ดาวน์โหลด
                            </td>
                        </tr>
                    </thead>
                    <tbody id="search-display-doc">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" id="reset-doc">รีเซต</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="search-users" tabindex="-1" aria-labelledby="search-usersLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #425D8D;">
                <h5 class="modal-title">ค้นหาสมาชิก</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-end">
                    <form class="d-flex" id="form-search-users">
                        <input class="form-control me-2" type="search" id="search_fname" placeholder="ชื่อสมาชิก" aria-label="Search">
                        <button class="btn btn-primary" type="submit">
                            ค้นหา
                        </button>
                    </form>
                </div>
                <table class="table table-hover mt-3 text-center">
                    <thead class="text-white" style="background-color: #474B8C;">
                        <tr>
                            <td>#</td>
                            <td>ชื่อผู้ใช้</td>
                            <td>รหัสผ่าน</td>
                            <td>ชื่อ</td>
                            <td>นามสกุล</td>
                            <td>เพศ</td>
                            <td>เบอร์โทร</td>
                            <td>อีเมล</td>
                            <td>ว-ด-ป ลงทะเบียน</td>
                            <td>รูปประจำตัว</td>
                        </tr>
                    </thead>
                    <tbody id="display-searchUsers">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="reset-searchUsers">รีเซต</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="users-data-modal" tabindex="-1" aria-labelledby="users-data-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #474B8C;">
                <h5 class="modal-title">ข้อมูลสมาชิก</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="display-users-data-dis">
                    <div class="d-flex justify-content-center mb-2">
                        <img src="../../../../App/public/admin_upload_img/" class="img-fluid border border-dark rounded-circle" id="users-imgs" style="width: 150px; height: 150px;">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="username" class="form-label-username mb-2">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" id="username_dis" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label-password mb-2">รหัสผ่าน</label>
                            <input type="text" class="form-control" id="password_dis" disabled>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="fname" class="form-label-fname mb-2">ชื่อ</label>
                            <input type="text" class="form-control" id="fname_dis" disabled>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="lname" class="form-label-lname mb-2">นามสกุล</label>
                            <input type="text" class="form-control" id="lname_dis" disabled>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="sex" class="form-label-sex mb-2">เพศ</label>
                            <input type="text" class="form-control" id="sex_dis" disabled>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="phone" class="form-label-phone mb-2">เบอร์โทร</label>
                            <input type="text" class="form-control" id="phone_dis" disabled>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="email" class="form-label-email mb-2">อีเมล</label>
                            <input type="text" class="form-control" id="email_dis" disabled>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="regis_date" class="form-label-regis_date mb-2">ว-ด-ป ลงทะเบียน</label>
                            <input type="text" class="form-control" id="regis_date_dis" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--  -->
            </div>
        </div>
    </div>
</div>
<?php require_once('../../../../App/bootstrap/footer.php'); ?>
<script src="../../../../App/resource/js/admin/admin_page_view.js"></script>
<script src="../../../../App/resource/js/chart.js"></script>
