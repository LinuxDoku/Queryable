<?php
namespace LinuxDoku\Queryable\Provider;

class ArrayProvider extends BaseProvider
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

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($offset)
    {
        return isset($this->array[$offset]);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to retrieve
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        if($this->offsetExists($offset)) {
            return $this->array[$offset];
        }
        return null;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to set
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->array[$offset] = $value;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to unset
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->array[$offset]);
    }
}