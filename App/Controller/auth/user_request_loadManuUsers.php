<?php

use App\Controller\auth\UserController;
use App\ResponseCode\Response;

require_once("../../../App/Controller/auth/UserController.php");
require_once("../../../App/Response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $loadUsersMenu = new UserController();
    $loadUsersMenu->loadMenuUsers((object)['user_id' => $_GET['user_id']]);
} else {
    Response::error();
}
