<?php

namespace UniSharp\Laravel\EloquentJoin\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use UniSharp\Laravel\EloquentJoin\Relations\BelongsToJoin;
use UniSharp\Laravel\EloquentJoin\Relations\HasManyJoin;
use UniSharp\Laravel\EloquentJoin\Relations\HasOneJoin;
use UniSharp\Laravel\EloquentJoin\Relations\MorphManyJoin;
use UniSharp\Laravel\EloquentJoin\Relations\MorphToManyJoin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

trait ExtendRelationsTrait
{
    protected function newBelongsTo(Builder $query, Model $child, $foreignKey, $ownerKey, $relation)
    {
        return new BelongsTo($query, $child, $foreignKey, $ownerKey, $relation);
    }

    protected function newHasOne(Builder $query, Model $parent, $foreignKey, $localKey)
    {
        return new HasOne($query, $parent, $foreignKey, $localKey);
    }

    protected function newHasMany(Builder $query, Model $parent, $foreignKey, $localKey)
    {
        return new HasMany($query, $parent, $foreignKey, $localKey);
    }

    protected function newMorphMany(Builder $query, Model $parent, $type, $id, $localKey)
    {
        return new MorphMany($query, $parent, $type, $id, $localKey);
    }

    protected function newMorphToMany(Builder $query, Model $parent, $name, $table,
                                      $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey,
                                      $relationName = null, $inverse = false
    ) {
        return new MorphToMany($query, $parent, $name, $table,
            $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey,
            $relationName = null, $inverse = false
        );
    }
}
