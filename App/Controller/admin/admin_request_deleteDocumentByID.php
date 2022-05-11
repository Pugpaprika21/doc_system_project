<?php

use App\Controller\admin\AdminController;
use App\ResponseCode\Response;

require_once("../../../App/Controller/admin/AdminController.php");
require_once("../../../App/Response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //print_r($_POST);

    $getDoc = new AdminController();
    $getDoc->deleteDocByID((object)[
        'doc_id' => $_POST['doc_id']
    ]);
    
} else {
    Response::error();
}
