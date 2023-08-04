<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ResponseService extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | generateResponse => Generate default Json response for client.
    |--------------------------------------------------------------------------
    |
    | By this function you can handle your errors or success responses.
    |
    */
    /**
     * @param  null  $result
     * @param  null  $message
     */
    public static function generateResponse(
        $result = null,
        bool $status = true,
        $message = null,
        int $statusCode = 200
    ): JsonResponse {
        $response = [
            'status' => $status,
        ];

        if ($result !== null) {
            $response['data'] = $result;
        }
        if ($message) {
            $response['message'] = $message;
        }

        return response()->json($response, $statusCode);
    }
}
