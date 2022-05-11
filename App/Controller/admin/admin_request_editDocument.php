<?php

use App\Controller\admin\AdminController;
use App\ResponseCode\Response;

require_once("../../../App/Controller/admin/AdminController.php");
require_once("../../../App/Response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $getDoc = new AdminController();
    $getDoc->getDocByID((object)[
        'doc_id' => $_POST['doc_id']
    ]);
    
} else {
    Response::error();
}
