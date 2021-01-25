<?php

declare(strict_types=1);

namespace Sb1\Money\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Sb1\Money\Amount;
use Stringable;

class AmountTest extends TestCase
{
    public function testFromStringAndBack(): void
    {
        $amount = Amount::fromString('10.00/EUR');
        $this->assertInstanceOf(Amount::class, $amount);
        $this->assertInstanceOf(Stringable::class, $amount);

        $this->assertSame('10.00/EUR', (string) $amount);
    }
}
