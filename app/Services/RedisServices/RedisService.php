<?php

namespace App\Services\RedisServices;

use Illuminate\Support\Facades\Redis;

class RedisService
{
    protected $redis;

    public function __construct()
    {
        $this->redis = Redis::connection();
    }
    /**
     * Set a value in Redis.
     *
     * @param string $key
     * @param mixed $value
     * @param int|null $expiration Time in seconds for expiration, null for no expiration.
     * @return void
     */
    public function set($key, $value, $expiration = null)
    {
        $value = is_array($value) ? json_encode($value) : $value;

        if ($expiration) {
            Redis::setex($key, $expiration, $value);
        } else {
            Redis::set($key, $value);
        }
    }

    public function getAllKeysData($pattern = '*')
    {
        $keys = Redis::keys($pattern);
        $data = [];

        foreach ($keys as $key) {
            $data[$key] = $this->get($key);
        }

        return $data;
    }

    /**
     * Get a value from Redis.
     *
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        $value = Redis::get($key);

        return json_decode($value, true) ?? $value;
    }

    /**
     * Delete a value from Redis.
     *
     * @param string $key
     * @return void
     */
    public function delete($key)
    {
        Redis::del($key);
    }
}
