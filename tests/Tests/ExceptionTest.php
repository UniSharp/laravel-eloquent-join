<?php

namespace UniSharp\Laravel\EloquentJoin\Tests\Tests;

use UniSharp\Laravel\EloquentJoin\Exceptions\InvalidAggregateMethod;
use UniSharp\Laravel\EloquentJoin\Exceptions\InvalidRelation;
use UniSharp\Laravel\EloquentJoin\Exceptions\InvalidRelationClause;
use UniSharp\Laravel\EloquentJoin\Exceptions\InvalidRelationGlobalScope;
use UniSharp\Laravel\EloquentJoin\Exceptions\InvalidRelationWhere;
use UniSharp\Laravel\EloquentJoin\Tests\Models\City;
use UniSharp\Laravel\EloquentJoin\Tests\Models\Seller;
use UniSharp\Laravel\EloquentJoin\Tests\TestCase;

class ExceptionTest extends TestCase
{
    public function testInvalidRelation()
    {
        try {
            City::whereJoin('sellers.id', '=', 'test')->get();
        } catch (InvalidRelation $e) {
            $this->assertEquals((new InvalidRelation())->message, $e->getMessage());

            return;
        }

        $this->assertTrue(false);
    }

    public function testInvalidRelationWhere()
    {
        try {
            Seller::whereJoin('locationPrimaryInvalid2.name', '=', 'test')->get();
        } catch (InvalidRelationWhere $e) {
            $this->assertEquals((new InvalidRelationWhere())->message, $e->getMessage());

            return;
        }

        $this->assertTrue(false);
    }

    public function testInvalidRelationClause()
    {
        try {
            Seller::whereJoin('locationPrimaryInvalid.name', '=', 'test')->get();
        } catch (InvalidRelationClause $e) {
            $this->assertEquals((new InvalidRelationClause())->message, $e->getMessage());

            return;
        }

        $this->assertTrue(false);
    }

    public function testInvalidRelationGlobalScope()
    {
        try {
            Seller::whereJoin('locationPrimaryInvalid3.id', '=', 'test')->get();
        } catch (InvalidRelationGlobalScope $e) {
            $this->assertEquals((new InvalidRelationGlobalScope())->message, $e->getMessage());

            return;
        }

        $this->assertTrue(false);
    }

    public function testInvalidAggregateMethod()
    {
        try {
            Seller::orderByJoin('locationPrimary.id', 'asc', 'wrong')->get();
        } catch (InvalidAggregateMethod $e) {
            $this->assertEquals((new InvalidAggregateMethod())->message, $e->getMessage());

            return;
        }

        $this->assertTrue(false);
    }
}
