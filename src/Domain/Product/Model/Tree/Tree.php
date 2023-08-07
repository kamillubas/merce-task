<?php
declare(strict_types=1);

namespace Domain\Product\Model\Tree;

class Tree
{
    private string $id;
    private string $type;
    private string $size;
    private float $price;
    private int $rows;

    public function __construct(string $id, string $type, string $size, float $price, int $rows)
    {
        $this->id = $id;
        $this->type = $type;
        $this->size = $size;
        $this->price = $price;
        $this->rows = $rows;
    }
    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getRows(): int
    {
        return $this->rows;
    }
}
