<?php

use App\Controller\auth\UserController;
use App\ResponseCode\Response;

require_once("../../../App/Controller/auth/UserController.php");
require_once("../../../App/Response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $userRegister = new UserController();
    $userRegister->userRegister((object)array(
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'sex' => $_POST['sex'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'imgs' => $_FILES['imgs']['name']
    ));

} else {
    Response::error();
}
