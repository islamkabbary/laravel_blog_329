<?php

namespace App\Helpers;


class ApiResponse
{
    public static function success($data = null, $message = "Success", $code = 200)
    {
        return response()->json([
            "success" => true,
            "message" => $message,
            "data" => $data,
            "errors" => null,
        ], $code);
    }
    
    public static function error($message = "Error", $errors = [], $code = 400)
    {
        return response()->json([
            "success" => false,
            "message" => $message,
            "data" => null,
            "errors" => $errors,
        ], $code);
    }
}
