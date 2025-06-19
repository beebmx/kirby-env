<?php

use Beebmx\KirbyEnv;
use Dotenv\Exception\InvalidPathException;

beforeEach(function () {
    $this->resources = __DIR__.'/Fixtures';
});

test('an env object is set with correct path file', function () {
    KirbyEnv::load($this->resources);

    expect($_ENV)
        ->toHaveKeys(['FOO', 'BAR', 'DUPLICATE_FOO']);
});

test('an env object throw exception error on invalid file path', function () {
    KirbyEnv::load(__DIR__.'/InvalidPath');
})->throws(InvalidPathException::class);

test('an env object is set with correct path file with overload', function () {
    KirbyEnv::overload($this->resources);

    expect($_ENV)
        ->toHaveKeys(['FOO', 'BAR', 'DUPLICATE_FOO']);
});

test('an env object throw exception error on invalid file path with overload', function () {
    KirbyEnv::overload(__DIR__.'/InvalidPath');
})->throws(InvalidPathException::class);
