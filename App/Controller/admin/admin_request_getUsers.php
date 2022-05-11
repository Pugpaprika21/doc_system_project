<?php

use App\Controller\admin\AdminController;
use App\ResponseCode\Response;

require_once("../../../App/Controller/admin/AdminController.php");
require_once("../../../App/Response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $getDoc = new AdminController();
    $getDoc->getUserToModal((object)[
        'user_id' => $_POST['user_id']
    ]);
    
} else {
    Response::error();
}
