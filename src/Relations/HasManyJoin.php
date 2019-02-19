<?php

namespace UniSharp\Laravel\EloquentJoin\Relations;

use UniSharp\Laravel\EloquentJoin\Traits\JoinRelationTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HasManyJoin extends HasMany
{
    use JoinRelationTrait;
}
