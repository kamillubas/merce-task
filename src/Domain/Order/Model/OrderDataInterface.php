<?php

namespace Domain\Order\Model;

use Domain\Order\Model\Product\Collection\OrderedDecorationCollectionInterface;
use Domain\Order\Model\Product\Tree\OrderedTreeInterface;
use Domain\Currency\Model\Currency;

interface OrderDataInterface
{
    public function getOrderedTree(): OrderedTreeInterface;
    public function getOrderedDecorations(): OrderedDecorationCollectionInterface;
    public function getOrderCurrency(): Currency;
}
