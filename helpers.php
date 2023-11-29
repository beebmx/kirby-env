<?php

use Beebmx\Env;

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed  $default
     */
    function env($key, $default = null): mixed
    {
        return Env::get($key, $default);
    }
}

if (! function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     */
    function value($value, ...$args): mixed
    {
        return $value instanceof Closure ? $value(...$args) : $value;
    }
}
