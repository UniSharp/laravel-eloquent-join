<?php

namespace UniSharp\Laravel\EloquentJoin\Tests\Models;

class Category extends BaseModel
{
    protected $table = 'categories';

    protected $fillable = ['name'];

    public function states()
    {
        return $this->morphedByMany(State::class, 'categorizable', 'categorizable', 'category_id');
    }
}
