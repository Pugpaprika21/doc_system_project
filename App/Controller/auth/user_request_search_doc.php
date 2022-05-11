<?php

use App\Controller\auth\UserController;
use App\ResponseCode\Response;

require_once("../../../App/Controller/auth/UserController.php");
require_once("../../../App/Response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $searchDocments = new UserController();
    $searchDocments->searchDocument((object)[
        'user_id' => $_POST['user_id'],
        'search' => $_POST['search']
    ]);

} else {
    Response::error();
}
