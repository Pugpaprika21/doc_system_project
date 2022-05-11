<?php

use App\Controller\admin\AdminController;
use App\ResponseCode\Response;

require_once("../../../App/Controller/admin/AdminController.php");
require_once("../../../App/Response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $searchDocments = new AdminController();
    $searchDocments->adminSearchDocument((object)[
        'search' => $_POST['search']
    ]);
    
} else {
    Response::error();
}
