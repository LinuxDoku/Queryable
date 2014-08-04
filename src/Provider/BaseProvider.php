<?php
namespace LinuxDoku\Queryable\Provider;

use ArrayAccess;
use Countable;
use Iterator;
use LinuxDoku\Queryable\QueryableProvider;

/**
 * Abstract base class for all providers.
 *
 * @package LinuxDoku\Queryable\Provider
 */
abstract class BaseProvider implements QueryableProvider, ArrayAccess, Iterator, Countable {

}