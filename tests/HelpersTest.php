<?php

namespace Beebmx\Tests;

use PHPUnit\Framework\TestCase;
use Beebmx\KirbyEnv;

class HelperTest extends TestCase
{
    private $resources;

    public function setUp()
    {
        (new KirbyEnv(__DIR__ . '/resources'))->load();
    }

    /**
    *
    * @test
    */
    public function a_helper_env_is_available()
    {
        $this->assertEquals('BAR', env('FOO'));
    }

    /**
    *
    * @test
    */
    public function an_not_defined_variable_returns_the_default_value()
    {
        $this->assertEquals('default', env('VAR', 'default'));
    }

    /**
    *
    * @test
    */
    public function a_defined_variable_ignore_the_default_value()
    {
        $this->assertEquals('BAR', env('FOO', 'default'));
    }
}
