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

    public function where($field, $value=null)
    {
        if($this->any()) {
            $result = [];

            if($value === null) {
               foreach($this->array as $val) {
                   if($val === $field) {
                       $result[] = $field;
                   }
               }
            } else {
                foreach($this->array as $key => $val) {
                    if($key === $field && $val === $value) {
                        $result[$key] = $val;
                    }
                }
            }

            return $result;
        }

        return [];
    }
}