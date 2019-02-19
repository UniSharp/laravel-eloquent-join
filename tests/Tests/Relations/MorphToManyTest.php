<?php

namespace UniSharp\Laravel\EloquentJoin\Tests\Tests\Relations;

use UniSharp\Laravel\EloquentJoin\Tests\Models\Image;
use UniSharp\Laravel\EloquentJoin\Tests\Models\State;
use UniSharp\Laravel\EloquentJoin\Tests\TestCase;

class MorphToManyTest extends TestCase
{
    public function testMorphToMany()
    {
        State::joinRelations('categories')->get();

        $queryTest = 'select states.*
            from "states"
            left join "categorizable" on "categorizable"."categorizable_id" = "states"."id"
            and "categorizable"."categorizable_type" = ?
            left join "categories" on "categories"."id" = "categorizable"."id"
            where "states"."deleted_at" is null
            group by "states"."id"';

        $this->assertQueryMatches($queryTest, $this->fetchQuery());
    }
}
