<?php

namespace App\Services;

use App\Abstract\RedisClient;

class RedisService extends RedisClient
{
    public function __construct()
    {
        parent::__construct();
    }

}