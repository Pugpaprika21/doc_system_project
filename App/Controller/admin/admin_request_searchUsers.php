<?php

use App\Controller\admin\AdminController;
use App\ResponseCode\Response;

require_once("../../../App/Controller/admin/AdminController.php");
require_once("../../../App/Response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $searchUsers = new AdminController();
    $searchUsers->searchUsers((object)[
        'fname' => $_POST['fname']
    ]);
    
} else {
    Response::error();
}
