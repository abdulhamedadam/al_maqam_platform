<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // if (!Auth::guard('web')->check()) {
        //     return redirect()->route('user.login');
        // }

        // if (Auth::guard('web')->user()->role !== $role) {
        //     abort(403, 'Unauthorized action.');
        // }
        if (!Auth::guard('web')->check()) {
            return redirect()->route('user.login');
        }

        $user = Auth::guard('web')->user();

        if ($user->role !== $role) {
            abort(403, 'Unauthorized action.');
        }


        return $next($request);
    }
}
