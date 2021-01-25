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

    public function testFromStringToArray(): void
    {
        $money = Money::fromString('1.234/GBP');
        $expected = [
            'amount' => 1234,
            'scale' => 3,
            'currency' => 'GBP',
        ];

        $this->assertSame($expected, $money->toArray());
    }
}
