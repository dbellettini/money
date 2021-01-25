<?php

declare(strict_types=1);

namespace Sb1\Money\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Sb1\Money\Money;
use Stringable;

class MoneyTest extends TestCase
{
    public static function validStrings(): array
    {
        return [
            ['10.00/EUR'],
            ['12.25/GBP'],
        ];
    }

    /**
     * @dataProvider validStrings
     */
    public function testFromStringAndBack(string $amountAsString): void
    {
        $amount = Money::fromString($amountAsString);
        $this->assertInstanceOf(Money::class, $amount);
        $this->assertInstanceOf(Stringable::class, $amount);

        $this->assertSame($amountAsString, (string) $amount);
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
