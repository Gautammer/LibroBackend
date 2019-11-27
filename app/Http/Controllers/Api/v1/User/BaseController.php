<?php

namespace App\Http\Controllers\Api\v1\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
     public function sendResponse($result, $message,$code=200)
    {
    	$response = [
            'status' => true,
            'message' => $message,
            'data'    => $result,
        ];

        return response()->json($response,$code);
    }

    public function sendError($error, $errorMessages = [], $code = 200)
    {
    	$response = [
            'status' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['errors'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
