<?php

namespace Beebmx;

use Dotenv\Dotenv;

class KirbyEnv
{
    public $dotenv;
    protected static $loaded = false;

    /**
     * Creates a new Env instance
     *
     * @param string $path
     * @param string $file
     *
     * @return void
     */
    public function __construct($path = __DIR__, $file = '.env')
    {
        static::$loaded = true;
        $this->dotenv = Dotenv::create($path, $file);
    }

    /**
     * Load environment file in given directory.
     *
     * @return array
     */
    public function load()
    {
        return $this->dotenv->load();
    }

    /**
     * Load environment file in given directory.
     *
     * @return array
     */
    public function overload()
    {
        return $this->dotenv->overload();
    }

    public static function isLoaded()
    {
        return !!static::$loaded;
    }
}
