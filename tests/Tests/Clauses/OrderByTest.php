<?php

namespace UniSharp\Laravel\EloquentJoin\Tests\Tests\Clauses;

use UniSharp\Laravel\EloquentJoin\Tests\Models\Order;
use UniSharp\Laravel\EloquentJoin\Tests\TestCase;

class OrderByTest extends TestCase
{
    public function testOrderBy()
    {
        Order::joinRelations('seller')
            ->orderByJoin('seller.id', 'asc')
            ->get();

        $queryTest = 'select orders.*, MAX(sellers.id) as sort
            from "orders" 
            left join "sellers" on "sellers"."id" = "orders"."seller_id" 
            where "orders"."deleted_at" is null 
            group by "orders"."id"
            order by sort asc';

        $this->assertQueryMatches($queryTest, $this->fetchQuery());
    }

    public function testOrderByMultiple()
    {
        Order::joinRelations('seller')
            ->orderByJoin('seller.id', 'asc')
            ->orderByJoin('seller.title', 'desc')
            ->get();

        $queryTest = 'select orders.*, MAX(sellers.id) as sort, MAX(sellers.title) as sort2
            from "orders" 
            left join "sellers" on "sellers"."id" = "orders"."seller_id" 
            where "orders"."deleted_at" is null 
            group by "orders"."id"
            order by sort asc, sort2 desc';

        $this->assertQueryMatches($queryTest, $this->fetchQuery());
    }
}
