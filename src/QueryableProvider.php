<?php
namespace LinuxDoku\Queryable;

interface QueryableProvider
{
    public function count($expression=null);
    public function any($expression=null);

    public function firstOrDefault($expression=null);
    public function lastOrDefault($expression=null);
    public function where($expression);

    public function toArray();
}