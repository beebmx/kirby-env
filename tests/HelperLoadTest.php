<?php

use Beebmx\KirbyEnv;

beforeEach(function () {
    KirbyEnv::load(__DIR__.'/Fixtures');
});

test('a helper env is available')
    ->expect(fn () => env('FOO'))
    ->toEqual('BAR');

test('an not defined variable returns the default value')
    ->expect(fn () => env('VAR', 'default'))
    ->toEqual('default');

test('a defined variable ignore the default value')
    ->expect(fn () => env('FOO', 'default'))
    ->toEqual('BAR');

test('a nested variable is set')
    ->expect(fn () => env('DUPLICATE_FOO', 'default'))
    ->toEqual('BAR');
