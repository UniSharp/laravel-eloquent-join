<?php

namespace UniSharp\Laravel\EloquentJoin\Tests\Models;

use UniSharp\Laravel\EloquentJoin\Traits\EloquentJoin;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use EloquentJoin;
}
