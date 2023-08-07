<?php

namespace Domain\Order\Model\Product\Tree;

interface OrderedTreeInterface
{
    public function getType(): string;
    public function getSize(): string;
}
