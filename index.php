<?php

@include_once __DIR__.'/vendor/autoload.php';

use Beebmx\Env;
use Beebmx\KirbyEnv;
use Kirby\Cms\App as Kirby;

Kirby::plugin('beebmx/env', [
    'options' => [
        'path' => null,
        'file' => '.env',
    ],
    'pageMethods' => [
        'env' => function ($value, $default = '') {
            $kirby = Kirby::instance();

            if (! KirbyEnv::isLoaded()) {
                KirbyEnv::load(
                    path: $kirby->option('beebmx.env.path', $kirby->roots()->index()),
                    file: $kirby->option('beebmx.env.file', '.env')
                );
            }

            return Env::get($value, $default);
        },
    ],
]);
