<?php

namespace UniSharp\Laravel\EloquentJoin\Tests\Tests\Relations;

use UniSharp\Laravel\EloquentJoin\Tests\Models\Seller;
use UniSharp\Laravel\EloquentJoin\Tests\TestCase;

class HasOneTest extends TestCase
{
    public function testHasOne()
    {
        Seller::joinRelations('location')->get();

        $queryTest = 'select sellers.* 
            from "sellers" 
            left join "locations" on "locations"."seller_id" = "sellers"."id" 
            and "locations"."deleted_at" is null 
            group by "sellers"."id"';

        $this->assertQueryMatches($queryTest, $this->fetchQuery());
    }

    public function testHasOneBelongsTo()
    {
        Seller::joinRelations('location.city')->get();

        $queryTest = 'select sellers.* 
            from "sellers" left join "locations" on "locations"."seller_id" = "sellers"."id" 
            and "locations"."deleted_at" is null 
            left join "cities" on "cities"."id" = "locations"."city_id" 
            and "cities"."deleted_at" is null 
            group by "sellers"."id"';

        $this->assertQueryMatches($queryTest, $this->fetchQuery());
    }

    public function testHasOneHasMany()
    {
        Seller::joinRelations('location.integrations')->get();

        $queryTest = 'select sellers.* 
            from "sellers" 
            left join "locations" on "locations"."seller_id" = "sellers"."id" 
            and "locations"."deleted_at" is null 
            left join "integrations" on "integrations"."location_id" = "locations"."id"
            and "integrations"."deleted_at" is null 
            group by "sellers"."id"';

        $this->assertQueryMatches($queryTest, $this->fetchQuery());
    }
}
