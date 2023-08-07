<?php
declare(strict_types=1);

namespace Domain\Product\Model\Decoration;

class Decoration
{
    private string $id;
    private string $type;
    private string $color;
    private string $size;
    private float $price;

    public function __construct(string $id, string $type, string $color, string $size, float $price)
    {
        $this->id = $id;
        $this->type = $type;
        $this->color = $color;
        $this->size = $size;
        $this->price = $price;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
