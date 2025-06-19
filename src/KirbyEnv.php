<?php

namespace Beebmx;

use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;
use Dotenv\Repository\Adapter\EnvConstAdapter;
use Dotenv\Repository\Adapter\ServerConstAdapter;
use Dotenv\Repository\RepositoryBuilder;

class KirbyEnv
{
    protected static bool $loaded = false;

    public static function load(string $path = __DIR__, string $file = '.env'): array
    {
        static::validatePath($path, $file);

        $repository = RepositoryBuilder::createWithNoAdapters()
            ->addAdapter(EnvConstAdapter::class)
            ->addWriter(ServerConstAdapter::class)
            ->immutable()
            ->make();

        static::$loaded = true;

        return Dotenv::create($repository, $path, $file)->load();
    }

    /**
     * Load environment file in given directory.
     */
    public static function overload(string $path = __DIR__, string $file = '.env'): array
    {
        static::validatePath($path, $file);

        static::$loaded = true;

        return Dotenv::createImmutable($path, $file)->load();
    }

    public static function isLoaded(): bool
    {
        return (bool) static::$loaded;
    }

    protected static function validatePath($path, $file): void
    {
        if (! file_exists($path = rtrim($path, '/').'/'.$file)) {
            throw new InvalidPathException(
                \sprintf('Unable to read the environment file at %s.', $path)
            );
        }
    }
}
