<?php
declare(strict_types=1);

namespace Infrastructure\Product\Entity;

use Domain\Product\Model\Specification\TreeSpecificationInterface;

class TreeSpecificationEntity implements TreeSpecificationInterface
{
    private array $types;
    private array $sizes;
    private array $prices;
    private array $rows;

    public function __construct(array $types, array $sizes, array $prices, array $rows)
    {
        $this->types = $types;
        $this->sizes = $sizes;
        $this->prices = $prices;
        $this->rows = $rows;
    }

    public function getTypes(): array
    {
        return $this->types;
    }

    public function getSizes(): array
    {
        return $this->sizes;
    }

    public function getPrices(): array
    {
        return $this->prices;
    }

    public function getRows(): array
    {
        return $this->rows;
    }
}
