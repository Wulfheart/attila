<?php

namespace Wulfheart\DDD\Tests;

use Orchestra\Testbench\TestCase;
use Wulfheart\DDD\DDDServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [DDDServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
