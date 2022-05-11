<?php

namespace App\Http\Controller;

use Fiber;
use stdClass;

class Controllers
{
    protected string $sql = "";
    protected array $store = [];

    public function jsonHeader(): void
    {
        header("Content-Type: application/json; charset=UTF-8");
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: PUT, GET, POST');
    }
}

/* 
$jsonStr = file_get_contents("php://input");
$json = json_decode($jsonStr);
*/
