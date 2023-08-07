<?php
declare(strict_types=1);

namespace Infrastructure\Order\Entity\Collection;

use Domain\Order\Model\Product\Collection\OrderedDecorationCollectionInterface;
use Domain\Order\Model\Product\Decoration\OrderedDecorationInterface;

class OrderedDecorationCollectionEntity implements OrderedDecorationCollectionInterface
{
    private array $decorations;
    public function add(OrderedDecorationInterface $decoration): void
    {
        $this->decorations[] = $decoration;
    }

    public function getOrderedDecorations(): array
    {
        return $this->decorations;
    }
}
