<?php
namespace LinuxDoku\Queryable\Provider;

use LinuxDoku\Queryable\QueryableProvider;

class ArrayProvider implements QueryableProvider
{
    protected $array;
    protected $arrayValues;

    public function __construct(array $collection = [])
    {
        $this->array = $collection;
    }

    protected function getArrayValues()
    {
        if($this->arrayValues === null) {
            $this->arrayValues = array_values($this->array);
        }
        return $this->arrayValues;
    }

    public function count()
    {
        return count($this->array);
    }

    public function any()
    {
        return $this->count() !== 0;
    }

    public function firstOrDefault()
    {
        if($this->any()) {
            return $this->array[0];
        }
        return null;
    }

    public function lastOrDefault()
    {
        if($this->any()) {
            return $this->getArrayValues()[$this->count() - 1];
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

        return new ArrayProvider();
    }
}