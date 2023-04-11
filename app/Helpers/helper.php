<?php

use App\Http\Resources\ResourceCollectionBase;

if (!function_exists('func_response_resource')) {
    function func_response_resource($resource, $collect, $collect_param = []): ResourceCollectionBase
    {
        return new ResourceCollectionBase($resource, $collect, $collect_param);
    }
}
