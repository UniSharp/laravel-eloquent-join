<?php

namespace Fico7489\Laravel\EloquentJoin\Tests\Tests\Relations;

use Fico7489\Laravel\EloquentJoin\Tests\Models\Image;
use Fico7489\Laravel\EloquentJoin\Tests\Models\State;
use Fico7489\Laravel\EloquentJoin\Tests\TestCase;

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
