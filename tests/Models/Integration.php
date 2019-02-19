<?php

namespace UniSharp\Laravel\EloquentJoin\Tests\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Integration extends BaseModel
{
    use SoftDeletes;

    protected $table = 'integrations';

    protected $fillable = ['name'];
}
