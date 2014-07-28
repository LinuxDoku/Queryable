<?php
namespace LinuxDoku\Queryable;

use LinuxDoku\Queryable\Provider\ArrayProvider;

class Queryable
{
    public static $providerMap = [
        'array' => ArrayProvider::class
    ];

    /**
     * Create a new Queryable instance of a collection.
     *
     * @param $collection Mixed collection to query.
     * @throws Exception when no suitable provider is found.
     * @return \LinuxDoku\Queryable\Queriable
     */
    public static function create($collection)
    {
        foreach(static::$providerMap as $type => $provider) {
            if(gettype($collection) === $type) {
                return new $provider($collection);
            }
        }

        throw new Exception(sprintf('No suitable provider found for type "%s"!', gettype($collection)));
    }
}