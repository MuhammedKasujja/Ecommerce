<?php

namespace App\Http\Controllers;

use App\CPU\Helpers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        try {
            Helpers::currency_load();
        }catch (\Exception $exception){

        }
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($message = "", $success_code = "", $payload = []) {

    	$response = ['success' => true, 'payload' => []];

        if(!empty($message)) {
            $response['message'] = $message;
        }

        if(!empty($success_code)) {
            $response['code'] = $success_code;
        }

        if(!empty($payload)) {
            $response['payload'] = $payload;
        }

        return response()->json($response, 200);
    
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function sendError($error, $error_code = 101, $error_data = [], $response_code = 200) {
    	//
        $response = ['success' => false, 'error' => $error , 'error_code' => $error_code];

        if(!empty($error_data)) {
            $response['payload'] = $error_data;
        }

        return response()->json($response, $response_code);
    }

}
