<?php declare(strict_types = 1);

namespace Apitin\Orm\Model;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Column
{
    public function __construct(public string $type, public bool $nullable = true)
    {
        
    }
}