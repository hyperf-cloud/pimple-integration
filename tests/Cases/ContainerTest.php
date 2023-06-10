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

use Hyperf\Pimple\Container;
use Hyperf\Support\Filesystem\Filesystem;
use HyperfTest\Stub\Foo;
use HyperfTest\Stub\Foo2;
use HyperfTest\Stub\Foo3;
use HyperfTest\Stub\Foo4;
use Pimple;

/**
 * @internal
 * @coversNothing
 */
class ContainerTest extends AbstractTestCase
{
    public function testMakeWithoutConstructor()
    {
        $container = new Container(new Pimple\Container());

        $system = $container->make(Filesystem::class);

        $this->assertInstanceOf(Filesystem::class, $system);
    }

    public function testMakeWithConstructor()
    {
        $container = new Container(new Pimple\Container());

        $system = $container->make(Foo::class);

        $this->assertInstanceOf(Foo::class, $system);
    }

    public function testMakeWithConstructorAndParamater()
    {
        $container = new Container(new Pimple\Container());

        $res = $container->make(Foo2::class, ['id' => 1]);
        $this->assertInstanceOf(Foo2::class, $res);

        $res = $container->make(Foo3::class, ['id' => 1]);
        $this->assertInstanceOf(Foo3::class, $res);

        $res = $container->make(Foo3::class, [1]);
        $this->assertInstanceOf(Foo3::class, $res);

        $res = $container->make(Foo4::class);
        $this->assertInstanceOf(Foo4::class, $res);
        $this->assertSame(1, $res->id);
    }

    public function testGet()
    {
        $container = new Container(new Pimple\Container());

        $res = $container->get(Foo4::class);

        ++$res->id;

        $res = $container->get(Foo4::class);

        $this->assertSame(2, $res->id);
    }
}
