<?php
declare(strict_types=1);

namespace Infrastructure\Product\Entity;

use Domain\Product\Model\Specification\DecorationSpecificationInterface;

class DecorationSpecificationEntity implements DecorationSpecificationInterface
{
    private array $types;
    private array $colors;
    private array $sizes;
    private array $prices;

    public function __construct(array $types, array $colors, array $sizes, array $prices)
    {
        $this->types = $types;
        $this->colors = $colors;
        $this->sizes = $sizes;
        $this->prices = $prices;
    }

    public function getTypes(): array
    {
        return $this->types;
    }

    public function getColors(): array
    {
        return $this->colors;
    }

    public function getSizes(): array
    {
        return $this->sizes;
    }

    public function getPrices(): array
    {
        return $this->prices;
    }
}
