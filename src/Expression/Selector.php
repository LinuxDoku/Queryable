<?php
namespace LinuxDoku\Queryable\Expression;

class Selector
{
    public static function select($obj, $query=null)
    {
        if($query === null) {
            return $obj;
        }

        if(is_callable($query)) {
            return $query($obj);
        }

        if(is_string($query)) {
            if(is_object($obj)) {
                return $obj->{$query};
            }

            if(is_array($obj)) {
                return $obj[$query];
            }
        }

        return null;
    }
} 