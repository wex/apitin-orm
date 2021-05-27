<?php

namespace Apitin\Orm {

    use Apitin\Orm\Model\Table;
    use ReflectionClass;
    use RuntimeException;

    function getTableName(object $class)
    {
        $classReflection = new ReflectionClass($class);

        $tableAttributes = $classReflection->getAttributes(Table::class);

        if (!$tableAttributes) throw new RuntimeException("Table is not defined.");

        return $tableAttributes[0]->newInstance()->name;
    }

}