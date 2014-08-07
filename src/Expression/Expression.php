<?php
namespace LinuxDoku\Queryable\Expression;

interface Expression
{
    public function equals($left, $right=null);
    public function notEqual($left, $right=null);

    public function greaterThan($left, $right=null);
    public function greaterThanOrEqual($left, $right=null);
    public function lessThan($left, $right=null);
    public function lessThanOrEqual($left, $right=null);
}