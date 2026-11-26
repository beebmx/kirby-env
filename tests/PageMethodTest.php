<?php

use Kirby\Cms\App;

beforeEach(function () {
    require_once __DIR__.'/../index.php';

    App::$enableWhoops = false;

    $this->kirby = new App([
        'roots' => [
            'index' => __DIR__.'/Fixtures',
        ],
        'site' => [
            'children' => [
                ['slug' => 'home'],
            ],
        ],
    ]);
});

test('the plugin is registered')
    ->expect(fn () => $this->kirby->plugin('beebmx/env'))
    ->not->toBeNull();

test('a page method env is available')
    ->expect(fn () => $this->kirby->page('home')->env('FOO'))
    ->toEqual('BAR');

test('a page method env returns the default value')
    ->expect(fn () => $this->kirby->page('home')->env('VAR', 'default'))
    ->toEqual('default');
