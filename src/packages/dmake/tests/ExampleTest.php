<?php

namespace Wulfheart\Dmake\Tests;

use Orchestra\Testbench\TestCase;
use Wulfheart\Dmake\DmakeServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [DmakeServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
