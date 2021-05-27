<?php declare(strict_types = 1);

namespace Apitin\Orm;

use Apitin\Orm\Model\Cache;

abstract class Model
{
    use Cache;

    protected array $__dirty = [];

    public function getTable(): string
    {
        return static::cache('table', function() {
            return getTableName($this);
        });
    }

    public function getFields(): array
    {
        return static::cache('columns', function() {
            return getColumns($this);
        });
    }

    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->getFields())) {
            $this->__dirty[$name] = $this->$name ?? null;
            $this->$name = $value;
        } else {
            // ???
        }
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->getFields())) {
            return $this->$name;
        } else {
            // ???
        }
    }
}