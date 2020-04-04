<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace HyperfTest\Cases;

use Hyperf\Pimple\Container;
use Hyperf\Utils\Filesystem\Filesystem;
use HyperfTest\Stub\Foo;
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
}
