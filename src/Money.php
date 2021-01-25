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
        preg_match('/^([0-9]+)\.([0-9]+)\/([A-Z]{3})$/', $string, $matches);

        $amount = intval($matches[1] . $matches[2]);
        $scale = strlen($matches[2]);
        $currency = $matches[3];

        return new self($amount, $scale, $currency);
    }

    public function __toString(): string
    {
        return sprintf(
            '%s.%s/%s',
            substr((string) $this->amount, 0, -$this->scale),
            substr((string) $this->amount, -$this->scale),
            $this->currency
        );
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
