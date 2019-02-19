<?php

namespace UniSharp\Laravel\EloquentJoin\Relations;

use UniSharp\Laravel\EloquentJoin\Traits\JoinRelationTrait;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HasOneJoin extends HasOne
{
    use JoinRelationTrait;
}
