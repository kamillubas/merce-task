<?php
declare(strict_types=1);

namespace Domain\Order\Processor;

use Domain\Currency\Model\Currency;
use Domain\Order\Behaviour\ConditionsCheckerInterface;
use Domain\Order\Model\Order;
use Domain\Product\Model\Collection\DecorationCollection;
use Domain\Product\Model\Decoration\Decoration;
use Domain\Product\Model\Tree\Tree;
use Exception;

class OrderProcessor implements ConditionsCheckerInterface
{
    private Order $order;

    public function process(Tree $tree, DecorationCollection $decorationCollection, Currency $currency): Order
    {
        if ($this->isAllowedDecorationQuantity($tree, $decorationCollection) &&
        $this->isDecorationSizeAllowedOnTree($tree, $decorationCollection)) {
            return $this->order = new Order(uniqid('order'), $tree, $decorationCollection, $currency);
        } else {
            throw new Exception("Wybrane dekoracje nie pasują do drzewka, lub ich ilość jest za duża");
        }
    }

    public function calculateFinalPrice(): float
    {
        $price = $this->order->getTree()->getPrice();
        foreach ($this->order->getDecorations()->getDecorationsCollection() as $decoration) {
            $price += $decoration->getPrice();
        }
        return $price / $this->order->getCurrency()->getValue();
    }

    public function isDecorationSizeAllowedOnTree(Tree $tree, DecorationCollection $decorationCollection): bool
    {
        /** @var $decoration Decoration */
        foreach ($decorationCollection->getDecorationsCollection() as $decoration) {
            if ($tree->getSize() === ConditionsCheckerInterface::SIZE_SMALL &&
                $decoration->getSize() === ConditionsCheckerInterface::SIZE_BIG) {
                return false;
            }
        }

        return true;
    }

    public function isAllowedDecorationQuantity(Tree $tree, DecorationCollection $decorationCollection): bool
    {
        if ($this->countDecorations($decorationCollection) < $this->countMaxDecorationsOnTree($tree)) {
            return true;
        }
        return false;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }


    private function countMaxDecorationsOnTree(Tree $tree): int
    {
        $sum = 0;
        for ($i = 0; $i < $tree->getRows(); $i++) {
            $sum += ($tree->getRows() - $i);
        }
        return $sum;
    }

    private function countDecorations(DecorationCollection $decorationCollection): int
    {
        return array_sum($decorationCollection->getDecorationsCollection());
    }
}
