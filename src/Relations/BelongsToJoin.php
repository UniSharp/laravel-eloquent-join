<?php

namespace UniSharp\Laravel\EloquentJoin\Relations;

use UniSharp\Laravel\EloquentJoin\Traits\JoinRelationTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BelongsToJoin extends BelongsTo
{
    use JoinRelationTrait;
}
