<?php
declare(strict_types=1);

namespace Infrastructure\Currency\Importer;

use Domain\Currency\CurrencyDataInterface;

class CurrencyDataImporter implements CurrencyDataInterface
{
    private array $currencies;
    public function __construct(array $data)
    {
        $this->currencies = $data;
    }
    public function getCurrencies(): array
    {
        return $this->currencies;
    }
}
