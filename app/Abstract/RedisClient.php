<?php

namespace App\Abstract;

abstract class RedisClient
{
    protected $redis;

    public function __construct()
    {
        $this->redis = new \Redis();
        $this->redis->connect('127.0.0.1', 6379);
    }

    public function get($key)
    {
        return $this->redis->get($key);
    }

    public function set($key, $value)
    {
        return $this->redis->set($key, $value);
    }

    public function delete($key)
    {
        return $this->redis->delete($key);
    }

    public function close()
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
