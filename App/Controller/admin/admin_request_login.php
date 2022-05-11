<?php

use App\Controller\admin\AdminController;
use App\ResponseCode\Response;

require_once("../../../App/Controller/admin/AdminController.php");
require_once("../../../App/Response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login = new AdminController();
    $login->adminLogin((object)[
        'admin_name' => $_POST['admin_name'],
        'admin_pass' => $_POST['admin_pass']
    ]);

} else {
    Response::error();
}
