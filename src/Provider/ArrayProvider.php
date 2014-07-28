<?php
namespace LinuxDoku\Queryable\Provider;

use LinuxDoku\Queryable\QueryableProvider;

class ArrayProvider implements QueryableProvider
{
    protected $array;

    public function __construct(array $collection)
    {
        $this->array = $collection;
    }

    public function any()
    {
        return count($this->array) !== 0;
    }

    public function firstOrDefault()
    {
        if($this->any()) {
            return $this->array[0];
        }
        return null;
    }

    public function where($expression)
    {
        if($this->any()) {
            if(is_callable($expression)) {
                $this->array = call_user_func($expression, $this->array);
            }

            return new ArrayProvider($this->array);
        }

        return [];
    }
}