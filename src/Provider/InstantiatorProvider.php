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

namespace Hyperf\Pimple\Provider;

use Doctrine\Instantiator\Instantiator;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class InstantiatorProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple[Instantiator::class] = new Instantiator();
    }
}
