<?php

namespace ZendTest\Expressive\Swoole;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Swoole\ServerFactory;
use Swoole\Http\Server as SwooleHttpServer;

class ServerFactoryTest extends TestCase
{

    public function setUp()
    {
        $this->container = $this->prophesize(ContainerInterface::class)->reveal();
    }

    public function testCreateSwooleServerCreatesAndReturnsSwooleHttpServerInstance()
    {
        $serverFactory = $this->prophesize(ServerFactory::class);
        $serverFactory->createSwooleServer()->willReturn($this->createMock(SwooleHttpServer::class));
        $serverFactory = $serverFactory->reveal();
        $swooleServer = $serverFactory->createSwooleServer();
        $this->assertInstanceOf(SwooleHttpServer::class, $swooleServer);
    }

    public function testCreateSwooleServerCreatesAndReturnsSwooleHttpServerInstanceWhenCallTwice()
    {
        $serverFactory = $this->prophesize(ServerFactory::class);
        $serverFactory->createSwooleServer()->willReturn($this->createMock(SwooleHttpServer::class));
        $serverFactory = $serverFactory->reveal();
        $swooleServer = $serverFactory->createSwooleServer();
        $callTwiceSwooleServer = $serverFactory->createSwooleServer();
        $this->assertSame($swooleServer, $callTwiceSwooleServer);
    }

    public function testCreateSwooleServerWithAppendOptions()
    {
        $options = [
            'daemonize' => false,
            'worker_num' => 1
        ];
        $serverFactory = $this->prophesize(ServerFactory::class);
        $serverFactory->createSwooleServer($options)->willReturn($this->createMock(SwooleHttpServer::class));
        $serverFactory = $serverFactory->reveal();
        $swooleServer = $serverFactory->createSwooleServer($options);
        $this->assertInstanceOf(SwooleHttpServer::class, $swooleServer);
    }
}
