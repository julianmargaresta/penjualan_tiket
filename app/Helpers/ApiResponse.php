<?php

function apiResponse($code, $message, $data)
{
    if ($code == 200) {

        $response = [
            'status' => $code,
            'message' => $message,
            'data' => $data,
        ];

    } else {

        $response = [
            'status' => $code,
            'message' => $message,
            'data' => $data
        ];
    
    }

    return response()->json($response, $code);
}