<?php require_once("../../../../App/bootstrap/header.php"); ?>
<link rel="stylesheet" href="../../../../App/resource/css/auth/users_register_view.css">
<!--  -->
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
                        <a class="nav-link text-white" href="/doc_system_project/index.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                            </svg> ย้อนกลับ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<br>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 50rem;">
            <div class="card-header text-white bg-primary mb-3">REGISTER</div>
            <div class="card-body">
                <form id="form-users-register" enctype="multipart/form-data">
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
                            <label for="firstname" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" id="fname" name="fname" aria-describedby="firstname" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" id="lname" name="lname" aria-describedby="lastname" required>
                        </div>
                        <div class="col-md-6">
                            <label for="select-gender" class="form-label">เพศ</label>
                            <select class="form-select" id="sex" name="sex" aria-label="Default select example" required>
                                <option selected>เลือกเพศ...</option>
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">เบอร์โทร</label>
                            <input type="phone" class="form-control" id="phone" name="phone" aria-describedby="phone" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">อีเมล</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="formFile" class="form-label">รูปประจำตัว</label>
                            <input type="file" class="form-control" id="imgs" name="imgs" required>
                            <br>
                            <img src="../../../../App/public/image_test/img_atk.png" id="imgs" width="100" height="100">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary" id="btn-submit">เข้าสู่ระบบ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once("../../../../App/bootstrap/footer.php"); ?>
<script src="../../../../App/resource/js/auth/users_register_view.js"></script>
