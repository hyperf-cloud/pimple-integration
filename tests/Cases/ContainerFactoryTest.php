<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace HyperfTest\Cases;

use Hyperf\Context\ApplicationContext;
use Hyperf\Pimple\Container;
use Hyperf\Pimple\ContainerFactory;
use HyperfTest\Stub\BarProvider;
use HyperfTest\Stub\Foo;
use Mockery;
use Psr\Container\ContainerInterface;

/**
 * @internal
 * @coversNothing
 */
class ContainerFactoryTest extends AbstractTestCase
{
    public function testContainerFactory()
    {
        ApplicationContext::setContainer(Mockery::mock(ContainerInterface::class));

        $container = (new ContainerFactory())();

        $this->assertInstanceOf(Container::class, $container);
        $this->assertSame($container, ApplicationContext::getContainer());
    }

    public function testProviderRegister()
    {
        $container = (new ContainerFactory([
            BarProvider::class,
        ]))();

        $this->assertInstanceOf(Container::class, $container);
        $this->assertSame($container, ApplicationContext::getContainer());
        $bar = $container->get('Bar');
        $this->assertInstanceOf(Foo::class, $bar);
    }
}
