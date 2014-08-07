<?php
namespace LinuxDoku\Queryable;

interface QueryableProvider
{
    /**
     * How many items are stored in the collection?
     *
     * @param null $expression
     * @return mixed
     */
    public function count($expression=null);

    /**
     * Is there any item matching the expression?
     *
     * @param null $expression
     * @return mixed
     */
    public function any($expression=null);

    /**
     * Get the first item matching the expression or null if none was found.
     *
     * @param null $expression
     * @return mixed
     */
    public function firstOrDefault($expression=null);

    /**
     * Get the last item matching the expression or null if none was found.
     *
     * @param null $expression
     * @return mixed
     */
    public function lastOrDefault($expression=null);

    /**
     * Get a new collection which is filtered by the expression.
     *
     * @param $expression
     * @return QueryableProvider
     */
    public function where($expression);

    /**
     * Convert the collection to an array.
     *
     * @return array
     */
    public function toArray();
}