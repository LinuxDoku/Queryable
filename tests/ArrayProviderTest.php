<?php
use LinuxDoku\Queryable\Queryable;
use LinuxDoku\Queryable\QueryableProvider;

class ArrayProviderTest extends PHPUnit_Framework_TestCase
{
    public function testCount()
    {
        $array = ['a', 'b'];
        $queryable = Queryable::create($array);
        $this->assertSame($queryable->count(), 2);
    }

    public function testAnyWithElements()
    {
        $arrayWithElements = ['test', 'test2', 'test3'];
        $queryable = Queryable::create($arrayWithElements);
        $this->assertTrue($queryable->any());
    }

    public function testAnyWithoutElements()
    {
        $emptyArray = [];
        $queryable = Queryable::create($emptyArray);
        $this->assertFalse($queryable->any());
    }

    public function testFirstOrDefaultWithEmptyArray()
    {
        $emptyArray = [];
        $queryable = Queryable::create($emptyArray);
        $this->assertTrue($queryable->firstOrDefault() === null);
    }

    public function testFirstOrDefaultWithArray()
    {
        $array = ['test1', 'test2'];
        $queryable = Queryable::create($array);
        $this->assertTrue($queryable->firstOrDefault() === 'test1');
    }

    public function testWhereExpressionLambda()
    {
        $array = ['my' => 'option', 'my' => 'second'];
        $queryable = Queryable::create($array);
        $result = $queryable->where(function($collection) {
            $result = [];
            foreach($collection as $key => $value) {
                if($key === 'my') {
                    $result[] = $value;
                }
            }
            return $result;
        });

        $this->assertTrue($result instanceof QueryableProvider);
        $this->assertTrue($result->any());
    }
}