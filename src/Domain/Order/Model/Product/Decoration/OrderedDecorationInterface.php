<?php

namespace Domain\Order\Model\Product\Decoration;

interface OrderedDecorationInterface
{
    public function getType(): string;
    public function getSize(): string;
    public function getColor(): string;
}
