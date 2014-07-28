<?php
namespace LinuxDoku\Queryable;

use LinuxDoku\Queryable\Provider\ArrayProvider;

class Queryable
{
    protected static $providerMap = [
        'array' => ArrayProvider::class
    ];

    /**
     * Create a new QueryableProvider instance for a collection.
     *
     * @param $collection Mixed collection to query.
     * @throws Exception when no suitable provider is found.
     * @return \LinuxDoku\Queryable\QueryableProvider
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

    /**
     * Register a new provider implementation.
     *
     * @param $type string type of the handled collection.
     * @param $provider string Full qualified namespace to the provider implementation.
     */
    public static function addProvider($type, $provider) {
        static::$providerMap[$type] = $provider;
    }
}