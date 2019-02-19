<?php

namespace UniSharp\Laravel\EloquentJoin\Relations;

use UniSharp\Laravel\EloquentJoin\Traits\JoinRelationTrait;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class MorphManyJoin extends MorphMany
{
    use JoinRelationTrait;
}
