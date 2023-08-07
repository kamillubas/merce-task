<?php
declare(strict_types=1);

namespace Domain\Product\Model\Collection;

use Domain\Product\Model\Decoration\Decoration;

class DecorationCollection
{
    private array $collection;

    public function add(Decoration $decoration): void
    {
        $this->collection[] = $decoration;
    }

    public function getDecorationsCollection(): array
    {
        return $this->collection;
    }
}
