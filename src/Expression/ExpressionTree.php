<?php
namespace LinuxDoku\Queryable\Expression;

interface ExpressionTree {
    /**
     * Add a new node to expression tree.
     *
     * @param Expression|ExpressionTree $expression
     * @return ExpressionTree
     */
    public function addNode($expression);

    /**
     * Add a new node with an and connection to expression tree.
     *
     * @param Expression|ExpressionTree $expression
     * @return ExpressionTree
     */
    public function addAnd($expression);

    /**
     * Add a new node with an or connection to expression tree.
     *
     * @param Expression|ExpressionTree $expression
     * @return ExpressionTree
     */
    public function addOr($expression);
}