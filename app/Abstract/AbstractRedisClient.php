<?php

namespace App\Abstract;

use phpDocumentor\Reflection\Types\Boolean;
use stdClass;

abstract class AbstractRedisClient
{
    protected $redis;

    public function __construct()
    {
        $this->redis = new \Redis();
        $this->connect();
    }

    protected function connect() : void
    {
        $this->redis->connect(
            config('host.redis'),
            config('host.redis.port')
        );
    }

    public function get($key) : string|array|stdClass
    {
        return $this->redis->get($key);
    }

    public function set($key, $value, $expiration) : bool
    {
        return $this->redis->setex($key, $value, $expiration);
    }

    public function delete($key) : bool
    {
        return $this->redis->del($key);
    }

    public function close() : bool
    {
        $this->redis->close();
    }

    public function __destruct()
    {
        $this->close();
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->redis, $name], $arguments);
    }


}
