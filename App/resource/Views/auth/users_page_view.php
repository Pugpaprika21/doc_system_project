<?php require_once("../../../../App/bootstrap/header.php"); ?>
<link rel="stylesheet" href="../../../../App/resource/css/auth/users_page_view.css">
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
                        <a class="nav-link text-white" href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg> สมาชิก
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
        <div class="col-sm-6 col-md-2">
            <ul class="list-group">
                <div class="text-center" id="menu-users">
                </div>
            </ul>
            <hr>
            <div class="card">
                <div class="card-body">
                    <canvas id="myChart" height="480"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-10">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-show-doc-all-tab" data-bs-toggle="pill" data-bs-target="#pills-doc" type="button" role="tab" aria-controls="pills-doc" aria-selected="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filetype-doc" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5Zm-7.839 9.166v.522c0 .256-.039.47-.117.641a.861.861 0 0 1-.322.387.877.877 0 0 1-.469.126.883.883 0 0 1-.471-.126.868.868 0 0 1-.32-.386 1.55 1.55 0 0 1-.117-.642v-.522c0-.257.04-.471.117-.641a.868.868 0 0 1 .32-.387.868.868 0 0 1 .471-.129c.176 0 .332.043.469.13a.861.861 0 0 1 .322.386c.078.17.117.384.117.641Zm.803.519v-.513c0-.377-.068-.7-.205-.972a1.46 1.46 0 0 0-.589-.63c-.254-.147-.56-.22-.917-.22-.355 0-.662.073-.92.22a1.441 1.441 0 0 0-.589.627c-.136.271-.205.596-.205.975v.513c0 .375.069.7.205.973.137.271.333.48.59.627.257.144.564.216.92.216.357 0 .662-.072.916-.216.256-.147.452-.356.59-.627.136-.274.204-.598.204-.973ZM0 11.926v4h1.459c.402 0 .735-.08.999-.238a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.59-.68c-.263-.156-.598-.234-1.004-.234H0Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.141 1.141 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082H.79V12.57Zm7.422.483a1.732 1.732 0 0 0-.103.633v.495c0 .246.034.455.103.627a.834.834 0 0 0 .298.393.845.845 0 0 0 .478.131.868.868 0 0 0 .401-.088.699.699 0 0 0 .273-.248.8.8 0 0 0 .117-.364h.765v.076a1.268 1.268 0 0 1-.226.674c-.137.194-.32.345-.55.454a1.81 1.81 0 0 1-.786.164c-.36 0-.664-.072-.914-.216a1.424 1.424 0 0 1-.571-.627c-.13-.272-.194-.597-.194-.976v-.498c0-.379.066-.705.197-.978.13-.274.321-.485.571-.633.252-.149.556-.223.911-.223.219 0 .421.032.607.097.187.062.35.153.489.272a1.326 1.326 0 0 1 .466.964v.073H9.78a.85.85 0 0 0-.12-.38.7.7 0 0 0-.273-.261.802.802 0 0 0-.398-.097.814.814 0 0 0-.475.138.868.868 0 0 0-.301.398Z" />
                                </svg> เอกสารของคุณ</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-upload-doc-tab" data-bs-toggle="pill" data-bs-target="#pills-upload" type="button" role="tab" aria-controls="pills-upload" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-upload mb-1" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                </svg> อัพโหลดเอกสาร
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-doc" role="tabpanel" aria-labelledby="pills-show-doc-all-tab">
                            <div id="show-doc-data">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalSearch-document">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search mb-1" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg> ค้นหา
                                    </button>
                                </div>
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
                        </div>
                        <div class="tab-pane fade" id="pills-upload" role="tabpanel" aria-labelledby="pills-upload-doc-tab">
                            <hr>
                            <form id="form-upload" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6 col-md-8">
                                        <div class="mb-3">
                                            <label for="doc-name" class="form-label-doc-name mb-2">ชื่อเอกสาร</label>
                                            <input type="text" class="form-control" id="doc-name" name="doc_name" placeholder="ชื่อเอกสาร" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="doc_type" class="form-label-doc_type mb-2">ประเภทเอกสาร</label>
                                            <input type="text" class="form-control" id="doc_type" name="doc_type" placeholder="ประเภทเอกสาร" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label-doc_file mb-2">เลือกไฟล์</label>
                                            <input class="form-control" type="file" id="formFile" name="doc_file[]" multiple="true" required>
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
                                    <div class="justify-content-start">
                                        <button type="reset" class="btn btn-warning">รีเซต</button>
                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEdit-Profile" tabindex="-1" aria-labelledby="username-header" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #425D8D;">
                <h5 class="modal-title">เเก้ไขข้อมูลส่วนตัว</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-edit-profile">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="username" class="form-label">username</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="username" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">password</label>
                            <input type="text" class="form-control" id="password" name="password" aria-describedby="password" required>
                        </div>
                        <div class="col-md-6">
                            <label for="firstname" class="form-label mt-2">ชื่อ</label>
                            <input type="text" class="form-control" id="fname" name="fname" aria-describedby="firstname" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label mt-2">นามสกุล</label>
                            <input type="text" class="form-control" id="lname" name="lname" aria-describedby="lastname" required>
                        </div>
                        <div class="col-md-6">
                            <label for="select-gender" class="form-label mt-2">เพศ</label>
                            <select class="form-select" id="sex" name="sex" aria-label="Default select example" required>
                                <option selected>เลือกเพศ...</option>
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label mt-2">เบอร์โทร</label>
                            <input type="phone" class="form-control" id="phone" name="phone" aria-describedby="phone" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label mt-2">อีเมล</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="formFile" class="form-label mt-2">รูปประจำตัว</label>
                            <input type="file" class="form-control" id="imgs" name="imgs" required>
                            <br>
                            <img id="img-update" src="../../../../App/public/image_test/img_atk.png" class="img-fluid rounded-circle" style="width: 40%; height: 60%;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">เเก้ไข</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalSearch-document" tabindex="-1" aria-labelledby="username-header" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #425D8D;">
                <h5 class="modal-title" id="username-header">ค้นหาเอกสารอื่นๆ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-end">
                    <form class="d-flex" id="form-search-doc">
                        <input class="form-control me-2" type="search" id="search-document" placeholder="ชื่อเอกสาร" aria-label="Search">
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
                        <!--  -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="reset-doc">รีเซต</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php require_once("../../../../App/bootstrap/footer.php"); ?>
<script src="../../../../App/resource/js/auth/users_page_view.js"></script>
<script src="../../../../App/resource/js/chart.js"></script>
