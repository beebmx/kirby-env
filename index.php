<?php

Kirby::plugin('beebmx/kirby-env', [
    'options' => [
        'file' => '.env',
    ],
    'pageMethods' => [
        'env' => function ($value, $default = '') {
            if (!Beebmx\KirbyEnv::isLoaded()) {
                $path = option('beebmx.kirby-env.path', kirby()->roots()->base());
                (new \Beebmx\KirbyEnv($path))->load();
            }

            return env($value, $default);
        }
    ]
]);
