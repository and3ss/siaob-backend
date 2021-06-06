<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class apiProtectedRoute extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user->active) {
                return response()->json(['message' => 'User is inactive']);
            }
        } catch (\Exception $e) {

            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {

                return response()->json(['error' => 'Unauthorized'], 403);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                // If the token is expired, then it will be refreshed and added to the headers
                try {
                  $refreshed = JWTAuth::refresh(JWTAuth::getToken());
                  $user = JWTAuth::setToken($refreshed)->toUser();
                } catch (JWTException $e){
                    return response()->json([
                        'code'   => 103,
                        'message' => 'Token cannot be refreshed, please Login again'
                    ]);
                }
            } else {
                return response()->json(['message' => 'Authorization Token not found']);
            }
        }
        return $next($request);
    }
}
