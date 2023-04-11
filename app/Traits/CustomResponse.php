<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait CustomResponse
{

    public function successResponse($data, $message = '', $code = Response::HTTP_OK): JsonResponse
    {
        $return = [
            'data'    => $data,
            'message' => $message
        ];
        if (is_null($data)) {
            unset($return['data']);
        }

        return response()->json($return, $code);
    }
}
