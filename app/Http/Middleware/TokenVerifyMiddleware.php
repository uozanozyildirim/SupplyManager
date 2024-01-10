<?php

namespace App\Http\Middleware;

use App\Services\TokenService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\RedisService;

class TokenVerifyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if(!$this->verifyOnRedis($token)) {
            return response()->json(['message' => 'Token is invalid'], 401);
        }


        return $next($request);
    }


    private function verifyToken($key) : bool {
        /** @var TokenService $tokenService */
        $tokenService =  app(TokenService::class);

         return $tokenService->verifyToken($key) ;
    }


}
