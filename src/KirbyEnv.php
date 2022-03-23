<?php

namespace Beebmx;

use Dotenv\Dotenv;
use Dotenv\Repository\Adapter\EnvConstAdapter;
use Dotenv\Repository\Adapter\ServerConstAdapter;
use Dotenv\Repository\RepositoryBuilder;

class KirbyEnv
{
    protected static bool $loaded = false;

    public static function load(string $path = __DIR__, string $file = '.env'): array
    {
        $repository = RepositoryBuilder::createWithNoAdapters()
            ->addAdapter(EnvConstAdapter::class)
            ->addWriter(ServerConstAdapter::class)
            ->immutable()
            ->make();

        static::$loaded = true;

        return Dotenv::create($repository, $path, null)->load();
    }

    /**
     * Load environment file in given directory.
     *
     * @param string $path
     * @param string $file
     * @return array
     */
    public static function overload(string $path = __DIR__, string $file = '.env'): array
    {
        static::$loaded = true;

        return Dotenv::createImmutable($path, $file)->load();
    }

    public static function isLoaded(): bool
    {
        return !!static::$loaded;
    }
}
