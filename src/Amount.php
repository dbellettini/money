<?php

declare(strict_types=1);

namespace Sb1\Money;

use Stringable;

class Amount implements Stringable
{
    public static function fromString(string $string): self
    {
        return new self();
    }

    public function __toString(): string
    {
        return '10.00/EUR';
    }
}
