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

namespace Hyperf\Pimple;

use Hyperf\Pimple\Provider\InstantiatorProvider;
use Hyperf\Utils\ApplicationContext;
use Pimple;

class ContainerFactory
{
    protected $providers = [
        InstantiatorProvider::class,
    ];

    public function __invoke()
    {
        $pimple = new Pimple\Container();
        foreach ($this->providers as $provider) {
            $pimple->register(new $provider());
        }

        $container = new Container($pimple);
        return ApplicationContext::setContainer($container);
    }
}
