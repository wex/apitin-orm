<?php declare(strict_types = 1);

namespace Apitin\Orm;

use Apitin\Orm\Model\Cache;

abstract class Model
{
    use Cache;

    public function getTable(): string
    {
        return static::cache('table', function() {
            return getTableName($this);
        });
    }

    public function getFields(): array
    {
        return [];
    }
}