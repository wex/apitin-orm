<?php declare(strict_types = 1);

namespace Apitin\Orm\Model;

use Apitin\Cache\Cache as CacheCache;
use Closure;

trait Cache
{
    protected static function cache(string $key, Closure $warm)
    {
        $className = static::class;
        
        return CacheCache::get("{$className}.{$key}", $warm);
    }
}