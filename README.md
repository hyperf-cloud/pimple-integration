# Pimple Container

[![Build Status](https://travis-ci.org/hyperf-cloud/pimple-integration.svg?branch=master)](https://travis-ci.org/hyperf-cloud/pimple-integration)

`hyperf/pimple` 是基于 `pimple/pimple` 实现的轻量级 `PSR11 规范` 的容器组件。可以减少其他框架使用 Hyperf 组件时的成本。

## 安装

```
composer create "hyperf/pimple:1.1.*"
```

## 使用

```php
<?php
use Hyperf\Pimple\ContainerFactory;

$container = (new ContainerFactory())();

```

### `EasySwoole` 接入 `hyperf/translation`

因为 `EasySwoole` 的容器组件暂时并没有实现 `PSR11` 规范，所以无法直接使用。接入步骤如下：

1. 首先引入相关组件

```
composer require "hyperf/translation:1.1.*"
composer require "hyperf/config:1.1.*"
```

2. `EasySwoole` 事件注册器在 `EasySwooleEvent.php` 中，所以我们需要在 `initialize()` 中初始化我们的容器和国际化组件。

```php
<?php

declare(strict_types=1);

namespace EasySwoole\EasySwoole;

use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;
use Hyperf\Config\Config;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Pimple\ContainerFactory;

class EasySwooleEvent implements Event
{
    public static function initialize()
    {
        date_default_timezone_set('Asia/Shanghai');
        $container = (new ContainerFactory())();
        $container->set(ConfigInterface::class, new Config([
            'translation' => [
                'locale' => 'zh_CN',
                'fallback_locale' => 'en',
                'path' => EASYSWOOLE_ROOT . '/storage/languages',
            ],
        ]));
    }
}
```



