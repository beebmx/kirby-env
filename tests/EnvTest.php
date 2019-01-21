<?php

namespace Beebmx\Tests;

use PHPUnit\Framework\TestCase;
use Beebmx\KirbyEnv;

class EnvTest extends TestCase
{
    protected $resources;

    public function setUp()
    {
        $this->resources = __DIR__ . '/resources';
    }

    /**
    *
    * @test
    */
    public function an_env_object_is_set_with_correct_path_file()
    {
        $env = new KirbyEnv($this->resources);
        $env->load();

        $this->assertArrayHasKey('FOO', $_ENV);
        $this->assertArrayHasKey('BAR', $_ENV);
        $this->assertArrayHasKey('DUPLICATE_FOO', $_ENV);
    }

    /**
    *
    * @test
    */
    public function an_env_object_trow_exception_error_on_invalid_filePath()
    {
        $this->expectException(\Dotenv\Exception\InvalidPathException::class);

        $env = new KirbyEnv(dirname(__DIR__));
        $env->load();
    }
}
