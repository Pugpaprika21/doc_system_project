<?php

namespace App\ResponseCode;

class Response
{
    /**
     * Undocumented function
     *
     * @param string $massage
     * @return void
     */
    public static function success(string $massage = "OK"): void
    {
        echo json_encode(array(
            "status" => 200, 
            "massage" => $massage,
            "response" => "success")
        );
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function error(string $massage = "ERROR"): void
    {
        echo json_encode(array(
            "status" => 400, 
            "massage" => $massage,
            "response" => "bad")
        );
    }
}