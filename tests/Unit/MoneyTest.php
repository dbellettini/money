<?php

declare(strict_types=1);

namespace Sb1\Money\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Sb1\Money\Money;
use Stringable;

class MoneyTest extends TestCase
{
    public function testFromStringAndBack(): void
    {
        $amount = Money::fromString('10.00/EUR');
        $this->assertInstanceOf(Money::class, $amount);
        $this->assertInstanceOf(Stringable::class, $amount);

        $this->assertSame('10.00/EUR', (string) $amount);
    }
}