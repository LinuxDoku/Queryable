<?php
namespace LinuxDoku\Queryable;

interface QueryableProvider
{
    public function count();
    public function any();
    public function firstOrDefault();
    public function where($expression);
} 