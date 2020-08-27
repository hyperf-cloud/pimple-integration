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
namespace HyperfTest\Stub;

use Psr\Container\ContainerInterface;

class Foo
{
    protected $id;

    public function __construct(ContainerInterface $container, int $id = 1)
    {
        $this->id = $id;
    }
}
