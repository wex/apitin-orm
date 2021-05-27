<?php

namespace Apitin\Orm {

    use Apitin\Orm\Model\Column;
    use Apitin\Orm\Model\Table;
    use ReflectionClass;
    use ReflectionProperty;
    use RuntimeException;

    function getTableName(object $class)
    {
        $classReflection = new ReflectionClass($class);

        $tableAttributes = $classReflection->getAttributes(Table::class);

        if (!$tableAttributes) throw new RuntimeException("Table is not defined.");

        return $tableAttributes[0]->newInstance()->name;
    }

    function getColumns(object $class)
    {
        $columns = [];

        $classReflection = new ReflectionClass($class);
        
        foreach ($classReflection->getProperties(ReflectionProperty::IS_PROTECTED) as $t) {
            $columnAttributes = $t->getAttributes(Column::class);

            if (!$columnAttributes) continue;

            $columnInfo = $columnAttributes[0]->newInstance();

            $columns[ $t->getName() ] = [
                'type'      => $columnInfo->type,
                'nullable'  => $columnInfo->nullable,
            ];
        }

        return $columns;
    }
}