<?php
declare(strict_types=1);

namespace Infrastructure\Order\Importer;

use Domain\Currency\Model\Currency;
use Domain\Order\Model\OrderDataInterface;
use Infrastructure\Currency\Importer\CurrencyDataImporter;
use Infrastructure\Order\Entity\Collection\OrderedDecorationCollectionEntity;
use Infrastructure\Order\Entity\Decoration\OrderedDecorationEntity;
use Infrastructure\Order\Entity\Tree\OrderedTreeEntity;

class OrderDataImporter implements OrderDataInterface
{
    private array $orderData;
    private CurrencyDataImporter $currencyData;

    public function __construct(array $orderData, CurrencyDataImporter $currencyData)
    {
        $this->orderData = $orderData;
        $this->currencyData = $currencyData;
    }
    public function getOrderedTree(): OrderedTreeEntity
    {
       return new OrderedTreeEntity(uniqid(), $this->orderData['tree']['type'], $this->orderData['tree']['size']);
    }

    public function getOrderedDecorations(): OrderedDecorationCollectionEntity
    {
        $orderedDecorationsCollection = new OrderedDecorationCollectionEntity();
        foreach ($this->orderData['decorations'] as $number => $item) {
            $orderedDecorationsCollection->add(
                new OrderedDecorationEntity(intval($number),
                    $item['type'],
                    $item['size'],
                    $item['color']
                )
            );
        }

        return $orderedDecorationsCollection;
    }

    public function getOrderCurrency(): Currency
    {
        if (array_key_exists($this->orderData['currency'], $this->currencyData->getCurrencies()))
        {
            $value = (float)($this->currencyData->getCurrencies()[$this->orderData['currency']]);
        }

        return new Currency($this->orderData['currency'], $value);
    }
}
