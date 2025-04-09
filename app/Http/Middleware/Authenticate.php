<?php

namespace App\Http\Middleware;

//use App\Http\Controllers\Api\ApiResponse;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    //    use ApiResponse;

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    /* protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }*/


    protected function redirectTo(Request $request)
    {
        if (!$request->expectsJson()) {
            return $request->routeIs('admin.*')
                    ? route('admin.login')
                    : route('user.login');
        }
    }
}
