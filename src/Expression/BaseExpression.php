<?php
namespace LinuxDoku\Queryable\Expression;

class BaseExpression implements Expression {

    /**
     * Return an iterator which iterates over the collection and
     * adds all values to the result which return true.
     *
     * @param $closure
     * @return callable
     */
    protected function conditionalIterator($closure)
    {
        return function($values) use ($closure) {
            $result = [];
            foreach($values as $value) {
                if($closure($value)) {
                    $result[] = $value;
                }
            }
            return $result;
        };
    }

    public function equals($left, $right=null)
    {
        return $this->conditionalIterator(function($value) use ($left) {
            return $value === $left;
        });
    }

    public function notEqual($left, $right=null)
    {
        return $this->conditionalIterator(function($value) use ($left) {
            return $value !== $left;
        });
    }

    public function greaterThan($left, $right=null)
    {
        return $this->conditionalIterator(function($value) use ($left) {
            return $value > $left;
        });
    }

    public function greaterThanOrEqual($left, $right=null)
    {
        return $this->conditionalIterator(function($value) use ($left) {
            return $value >= $left;
        });
    }

    public function lessThan($left, $right=null)
    {
        return $this->conditionalIterator(function($value) use ($left) {
            return $value < $left;
        });
    }

    public function lessThanOrEqual($left, $right=null)
    {
        return $this->conditionalIterator(function($value) use ($left) {
            return $value <= $left;
        });
    }
}