<?php
/**
 * @see       https://github.com/zendframework/zend-expressive-swoole for the canonical source repository
 * @copyright Copyright (c) 2018 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   https://github.com/zendframework/zend-expressive-swoole/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Zend\Expressive\Swoole;

use Psr\Container\ContainerInterface;
use Zend\Console\Getopt;

class ConsoleFactory
{

    public function __invoke(ContainerInterface $container) : Console
    {
        $driver = new Getopt([
            'd|daemonize'  => 'Daemonize the swoole server process',
            'n|worker_num|num_worker=i' => 'The number of the worker process.',
        ]);
        return new Console($driver);
    }
}
