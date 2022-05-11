<?php

use App\Controller\admin\AdminController;
use App\ResponseCode\Response;

require_once("../../../App/Controller/admin/AdminController.php");
require_once("../../../App/Response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $loadManu = new AdminController();
    $loadManu->loadMenuAdmin((object)[
        'admin_id' => $_GET['admin_id']
    ]);
    
} else {
    Response::error();
}
