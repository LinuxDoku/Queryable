<?php
namespace LinuxDoku\Queryable;

interface QueryableProvider
{
    public function count();
    public function any();


    public function firstOrDefault($expression=null);
    public function lastOrDefault($expression=null);
    public function where($expression);

    public function toArray();
}