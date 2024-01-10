<?php

namespace App\Services;

use ReallySimpleJWT\Token;

class TokenService extends Token
{

    private RedisService $redisService;

    public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }

    /**
     * Generate a new JWT token for the given user.
     *
     * @param $user
     * @return string
     */
    public function generateTokenFromUserId($userId): string
    {
        $payload = [
            'issuer'     => config('token.issuer'),
            'secret'     => config('token.secret'),
            'expiration' => config('token.expiration'),
            'userId' => $userId,
        ];

         return $this::create($payload['userId'], $payload['secret'], $payload['expiration'], $payload['issuer']);

    }


    /**
     * Store the JWT token in Redis.
     *
     * @param string $token
     * @param int $userId
     */
    public function storeTokenInRedis($token, $userId, $expiration = null)
    {
        $this->redisService->set('jwt_token_' . $userId, $token, $expiration);

    }

    /**
     * Invalidate a JWT token in Redis.
     *
     * @param int $userId
     */
    public function invalidateToken($userId)
    {
        $this->redisService->delete('jwt_token_' . $userId);
    }


}

