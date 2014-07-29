<?php
namespace LinuxDoku\Queryable\Expression;

interface Expression
{
    public function equals($left, $right);
    public function notEqual($left, $right);

    public function greaterThan($left, $right);
    public function greaterThanOrEqual($left, $right);
    public function lessThan($left, $right);
    public function lessThanOrEqual($left, $right);
}