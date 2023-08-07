<?php
declare(strict_types=1);

namespace Domain\Currency\Model;

class Currency
{
    private string $symbol;
    private float $value;

    public function __construct(string $symbol, float $value)
    {
        $this->symbol = $symbol;
        $this->value = $value;
    }
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
