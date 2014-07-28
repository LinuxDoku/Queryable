<?php
namespace LinuxDoku\Queryable;

interface QueryableProvider
{
    public function any();
    public function firstOrDefault();
    public function where($field, $value);
} 