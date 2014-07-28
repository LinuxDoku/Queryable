<?php
use LinuxDoku\Queryable\Queryable;

class ArrayProviderTest extends PHPUnit_Framework_TestCase
{
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
}