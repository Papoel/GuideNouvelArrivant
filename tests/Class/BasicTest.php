<?php

declare(strict_types=1);

namespace App\Tests\Class;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BasicTest extends WebTestCase
{
    public function testOneEqualsOne(): void
    {
        $this->assertEquals(expected: 1, actual: 1);
    }
}
