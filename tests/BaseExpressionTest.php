<?php

use LinuxDoku\Queryable\Expression\ClosureExpressionProvider;
use LinuxDoku\Queryable\Queryable;

class BaseExpressionTest extends PHPUnit_Framework_TestCase {
    public function testExpressionEquals() {
        $array = [1, 2, 3];
        $queryable = Queryable::create($array);
        $baseExpression = new ClosureExpressionProvider();
        $this->assertTrue($queryable->any($baseExpression->equals(1)));
    }

    public function testExpressionEqualsFail() {
        $array = [1, 2, 3];
        $queryable = Queryable::create($array);
        $baseExpression = new ClosureExpressionProvider();
        $this->assertFalse($queryable->any($baseExpression->equals(5)));
    }

    public function testExpressionGreaterThanOrEqual() {
        $array = [1, 2, 3];
        $queryable = Queryable::create($array);
        $baseExpression = new ClosureExpressionProvider();
        $this->assertTrue($queryable->any($baseExpression->greaterThanOrEqual(1)));
    }
}