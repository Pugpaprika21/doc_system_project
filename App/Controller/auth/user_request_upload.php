<?php

use App\Controller\auth\UserController;
use App\ResponseCode\Response;

require_once("../../../App/Controller/auth/UserController.php");
require_once("../../../App/Response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $uploads = new UserController();
    $uploads->uploadFile((object)[
        'user_id' => $_POST['user_id'],
        'doc_name' => $_POST['doc_name'],
        'doc_type' => $_POST['doc_type'],
        'doc_file' => $_FILES['doc_file']['name'],
        'doc_sender' => $_POST['doc_sender'],
        'doc_recipient' => $_POST['doc_recipient'],
        'doc_com' => $_POST['doc_com'],
    ]);

} else {
    Response::error();
}
