<?php

namespace Domain\Order\Behaviour;

use Domain\Currency\Model\Currency;
use Domain\Product\Model\Collection\DecorationCollection;
use Domain\Product\Model\Tree\Tree;

interface ConditionsCheckerInterface
{
    const SIZE_BIG = 'big';
    const SIZE_SMALL = 'small';
    public function isDecorationSizeAllowedOnTree(Tree $tree, DecorationCollection $decorationCollection): bool;
    public function isAllowedDecorationQuantity(Tree $tree, DecorationCollection $decorationCollection): bool;
    public function calculateFinalPrice(Currency $currency): float;
}
