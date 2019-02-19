<?php

namespace UniSharp\Laravel\EloquentJoin\Relations;

use UniSharp\Laravel\EloquentJoin\Traits\JoinRelationTrait;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class MorphToManyJoin extends MorphToMany
{
    use JoinRelationTrait;
}
