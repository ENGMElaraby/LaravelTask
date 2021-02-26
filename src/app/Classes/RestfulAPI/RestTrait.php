<?php

namespace App\Classes\RestfulAPI;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait RestTrait
{
    /**
     * Determines if request is an api call.
     * If the request URI contains '/api'.
     *
     * @param Request $request
     * @return bool
     */
    protected function isApiCall(Request $request): bool
    {
        return Str::contains($request->url(), '/api');
    }

}
