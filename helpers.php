<?php

if (!function_exists('env')) {
    /**
     * Wrapped around from the env Laravel Helper created by Taylor Otwell
     * https://github.com/illuminate/support/blob/daff271f818873a5b4949045460e96f48e32b7ad/helpers.php#L628
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);
        if ($value === false) {
            return value($default);
        }
        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }
        if (($valueLength = strlen($value)) > 1 && $value[0] === '"' && $value[$valueLength - 1] === '"') {
            return substr($value, 1, -1);
        }
        return $value;
    }
}

if (!function_exists('value')) {
    /**
     * Wrapped around from the value Laravel Helper created by Taylor Otwell
     * https://github.com/illuminate/support/blob/daff271f818873a5b4949045460e96f48e32b7ad/helpers.php#L1216
     *
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}
