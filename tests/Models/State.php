<?php

namespace UniSharp\Laravel\EloquentJoin\Tests\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class State extends BaseModel
{
    use SoftDeletes;

    protected $table = 'states';

    protected $fillable = ['name'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable', 'categorizable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
