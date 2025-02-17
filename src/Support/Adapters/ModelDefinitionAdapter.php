<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Support\Adapters;

use Illuminate\Support\Collection;
use SAC\EloquentModelGenerator\Model\ModelDefinition as DomainModelDefinition;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition as LegacyModelDefinition;

final class ModelDefinitionAdapter
{
    public function toLegacy(DomainModelDefinition $model): LegacyModelDefinition
    {
        return new LegacyModelDefinition(
            $model->getName(),
            $model->getNamespace(),
            Collection::make($model->getColumns()),
            Collection::make($model->getRelations()),
            null, // baseClass
            false, // withSoftDeletes
            true, // withFillable
            true, // withCasts
            $model->getTableName()
        );
    }

    public function toDomain(LegacyModelDefinition $model): DomainModelDefinition
    {
        return new DomainModelDefinition(
            $model->getClassName(),
            $model->getNamespace(),
            $model->getTableName() ?? '',
            $model->getColumns()->toArray(),
            $model->getRelations()->toArray()
        );
    }
}
