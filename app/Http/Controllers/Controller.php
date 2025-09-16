<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function successResponse($data = [], $message = null, $code = 200)
    {
        return response()->json([
            'status'  => true,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    public function errorResponse($message, $code = 404)
    {
        return response()->json([
            'status'  => false,
            'message' => $message,
            'data'    => [],
        ], $code);
    }
}
