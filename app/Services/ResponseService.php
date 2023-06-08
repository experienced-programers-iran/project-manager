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
     * @param null $result
     * @param bool $success
     * @param null $message
     * @param int $status_code
     * @return JsonResponse
     */
    public function generateResponse(
        $result = null,
        bool $success = true,
        $message = null,
        int $status_code = 200
    ): JsonResponse
    {
        $response = [
            'success' => $success,
        ];

        if ($result !== null) {
            $response['data'] = $result;
        }
        if ($message) {
            $response['message'] = $message;
        }

        return response()->json($response, $status_code);
    }
}
