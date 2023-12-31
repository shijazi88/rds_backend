<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait ClearsCache
{
    protected static function bootClearsCache()
    {
        static::created(function () {
            static::clearCache();
        });

        static::updated(function () {
            static::clearCache();
        });
    }

    protected static function clearCache()
    {
        $cacheKey = static::getCacheKey(); // Implement this method in each model to define the cache key
        Cache::forget($cacheKey);
    }
}
