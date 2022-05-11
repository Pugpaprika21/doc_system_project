<?php require_once("App/bootstrap/header.php"); ?>
<link rel="stylesheet" href="App/resource/css/index.css"> 
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
                        <a class="nav-link text-white" href="App/resource/Views/admin/admin_login_view.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                            </svg> ผู้ดูเเลระบบ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                            </svg> หน้าเเรก
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
        <div class="card" style="width: 30rem;">
            <div class="card-header text-white bg-primary mb-3">LOGIN</div>
            <div class="card-body">
                <form id="form-users-login">
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                        <a href="App/resource/Views/auth/users_register_view.php" class="link-primary">ลงทะเบียน</a>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-submit">เข้าสู่ระบบ</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once("App/bootstrap/footer.php"); ?>
<!-- <script src="App/resource/js/index.js"></script> -->
<script>
    $(document).ready(function() {

        $('#form-users-login').submit(function(e) {
            e.preventDefault();

            let username = $('#username').val();
            let password = $('#password').val();

            if (username.trim() != "" && password.trim() != "") {

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "App/Controller/auth/user_request_login.php",
                    data: {
                        username: username.trim(),
                        password: password.trim()
                    },
                    success: function(login) {

                        try {

                            if (login[0].username == username && login[0].password == password) {

                                let md5 = function(param) {
                                    return CryptoJS.MD5(param).toString();
                                }

                                window.localStorage.setItem("user_id", login[0].user_id);
                                window.localStorage.setItem("username", login[0].username);
                                window.localStorage.setItem("password", md5(login[0].password));

                                Swal.fire(
                                    'สำเร็จ',
                                    'เข้าสู่ระบบ',
                                    'success'
                                ).then(function(result) {
                                    window.location.href = `App/resource/Views/auth/users_page_view.php?user_id=${login[0].user_id}`;
                                });

                            }

                        } catch (err) {

                            Swal.fire(
                                'ผิดพลาด',
                                'username หรือ password ไม่ถูกต้อง!',
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
</script>