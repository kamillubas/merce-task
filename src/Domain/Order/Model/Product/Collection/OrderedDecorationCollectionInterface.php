<?php

namespace Domain\Order\Model\Product\Collection;

use Domain\Order\Model\Product\Decoration\OrderedDecorationInterface;

interface OrderedDecorationCollectionInterface
{
    public function add(OrderedDecorationInterface $decoration): void;
    public function getOrderedDecorations(): array;
}
