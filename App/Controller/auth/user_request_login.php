<?php

use App\Controller\auth\UserController;
use App\ResponseCode\Response;

require_once("../../../App/Controller/auth/UserController.php");
require_once("../../../App/Response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $userLogin = new UserController();
    $userLogin->userLogin((object)array(
        'username' => $_POST['username'],
        'password' => $_POST['password'],
    ));
   
} else {
    Response::error();
}
