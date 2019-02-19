<?php

namespace Fico7489\Laravel\EloquentJoin\Traits;

use Fico7489\Laravel\EloquentJoin\Relations\BelongsToJoin;
use Fico7489\Laravel\EloquentJoin\Relations\HasManyJoin;
use Fico7489\Laravel\EloquentJoin\Relations\HasOneJoin;
use Fico7489\Laravel\EloquentJoin\Relations\MorphManyJoin;
use Fico7489\Laravel\EloquentJoin\Relations\MorphToJoin;
use Fico7489\Laravel\EloquentJoin\Relations\MorphToManyJoin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

trait ExtendRelationsTrait
{
    protected function newBelongsTo(Builder $query, Model $child, $foreignKey, $ownerKey, $relation)
    {
        return new BelongsToJoin($query, $child, $foreignKey, $ownerKey, $relation);
    }

    protected function newHasOne(Builder $query, Model $parent, $foreignKey, $localKey)
    {
        return new HasOneJoin($query, $parent, $foreignKey, $localKey);
    }

    protected function newHasMany(Builder $query, Model $parent, $foreignKey, $localKey)
    {
        return new HasManyJoin($query, $parent, $foreignKey, $localKey);
    }

    protected function newMorphMany(Builder $query, Model $parent, $type, $id, $localKey)
    {
        return new MorphManyJoin($query, $parent, $type, $id, $localKey);
    }

    protected function newMorphToMany(Builder $query, Model $parent, $name, $table,
                                      $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey,
                                      $relationName = null, $inverse = false
    ) {
        return new MorphToManyJoin($query, $parent, $name, $table,
            $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey,
            $relationName = null, $inverse = false
        );
    }
}
