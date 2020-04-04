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

class Foo3
{
    protected $ids = [];

    public function __construct(int $id)
    {
        $this->ids[] = $id;
    }

    public function getIds(): array
    {
        return $this->ids;
    }
}
