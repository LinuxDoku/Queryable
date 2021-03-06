<?php
namespace LinuxDoku\Queryable\Provider;

class ArrayProvider extends BaseProvider
{
    /**
     * Array collection.
     *
     * @var array
     */
    protected $array;

    /**
     * Cached array with array values.
     *
     * @var array
     */
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

    public function count($expression=null)
    {
        if($expression !== null) {
            return $this->where($expression)->count();
        }
        return count($this->array);
    }

    public function any($expression=null)
    {
        if($expression !== null) {
            return $this->where($expression)->any();
        }
        return $this->count() !== 0;
    }

    public function firstOrDefault($expression=null)
    {
        if($this->any()) {
            if($expression !== null) {
                return $this->where($expression)->firstOrDefault();
            }
            return $this->array[0];
        }
        return null;
    }

    public function lastOrDefault($expression=null)
    {
        if($this->any()) {
            if($expression !== null) {
                return $this->where($expression)->lastOrDefault();
            }
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

    public function toArray()
    {
        return $this->array;
    }
}