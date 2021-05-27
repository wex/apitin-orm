<?php declare(strict_types = 1);

namespace Apitin\Orm\Model;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Table
{
    public function __construct(public string $name)
    {
        
    }
}