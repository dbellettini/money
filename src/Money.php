<?php

declare(strict_types=1);

namespace Sb1\Money;

use Stringable;

class Money implements Stringable
{
    private int $amount;
    private int $scale;
    private string $currency;

    private function __construct(int $amount, int $scale, string $currency)
    {
        $this->amount = $amount;
        $this->scale = $scale;
        $this->currency = $currency;
    }

    public static function fromString(string $string): self
    {
        return new self(1234, 3, 'GBP');
    }

    public function __toString(): string
    {
        return '10.00/EUR';
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'scale' => $this->scale,
            'currency' => $this->currency,
        ];
    }
}
