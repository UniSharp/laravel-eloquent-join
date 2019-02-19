<?php

namespace Fico7489\Laravel\EloquentJoin\Tests\Models;

class Image extends BaseModel
{
    protected $table = 'images';

    protected $fillable = ['imageable_id', 'imageable_type'];

    public function state()
    {
        return $this->morphTo('imageable');
    }
}
