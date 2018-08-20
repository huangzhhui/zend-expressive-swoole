<?php
/**
 * @see       https://github.com/zendframework/zend-expressive-swoole for the canonical source repository
 * @copyright Copyright (c) 2018 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   https://github.com/zendframework/zend-expressive-swoole/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Zend\Expressive\Swoole;

use Zend\Console\Getopt;

class Console
{

    /**
     * @var Getopt
     */
    private $driver;

    /**
     * Console constructor.
     *
     * @param Getopt $driver
     */
    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    public function getAction() : string
    {
        $args = $this->getArguments();
        $action = $args[0] ?? '';
        return $action;
    }

    public function getArguments() : array
    {
        $args = $this->driver->getArguments();
        return $args ?? [];
    }

    /**
     * @return mixed
     */
    public function getOption(string $key, $default = null)
    {
        $option = $this->driver->getOption($key);
        return $option ?? $default;
    }
}
