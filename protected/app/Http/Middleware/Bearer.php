<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
class Bearer extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return 'lol';
        }
    }
    // public function handle(Request $request, Closure $next)
    // {
    //     $bearerToken = $request->bearerToken();

    //     if (empty($bearerToken)) {
    //         return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);
    //     }

    //     // $user = Auth::user();
    //     // dd($user);
    //     // if (!$user || !$user->tokens()->where('token', hash('sha256', $bearerToken))->exists()) {
    //     //     return response()->json(['error' => 'Invalid Bearer token.'], 401);
    //     // }
    //     return $next($request);
    // }
}
