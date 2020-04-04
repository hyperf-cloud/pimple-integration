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

namespace HyperfTest\Stub;

use Hyperf\Contract\ContainerInterface;
use Hyperf\Pimple\ProviderInterface;

class BarProvider implements ProviderInterface
{
    public function register(ContainerInterface $container)
    {
        $container->set('Bar', new Foo($container, 100));
    }
}
