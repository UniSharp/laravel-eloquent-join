<?php

namespace UniSharp\Laravel\EloquentJoin\Tests\Tests\Relations;

use UniSharp\Laravel\EloquentJoin\Tests\Models\Image;
use UniSharp\Laravel\EloquentJoin\Tests\Models\State;
use UniSharp\Laravel\EloquentJoin\Tests\TestCase;

class MorphManyTest extends TestCase
{
    public function testMorphMany()
    {
        State::joinRelations('images')->get();

        $queryTest = 'select states.*
            from "states"
            left join "images" on "images"."imageable_id" = "states"."id"
            and "images"."imageable_type" = ?
            where "states"."deleted_at" is null
            group by "states"."id"';

        $this->assertQueryMatches($queryTest, $this->fetchQuery());
    }
}
