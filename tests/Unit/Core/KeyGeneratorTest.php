<?php


namespace Tests\Unit\Core;

use App\Core\KeyGenerator;
use PHPUnit\Framework\TestCase;

class KeyGeneratorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_keyGen()
    {
        $generator = new KeyGenerator();
        $key = $generator->getKey();
        $this->assertTrue(is_string($key));
        $this->assertTrue(strlen($key) > 10);

    }
}
