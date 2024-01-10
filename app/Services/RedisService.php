<?php

namespace App\Services;

use App\Abstract\AbstractRedisClient;

class RedisService extends AbstractRedisClient
{
    public function __construct()
    {
        parent::__construct();
    }

}