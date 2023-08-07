<?php
declare(strict_types=1);

namespace Infrastructure\Order\Entity\Decoration;

use Domain\Order\Model\Product\Decoration\OrderedDecorationInterface;

class OrderedDecorationEntity implements OrderedDecorationInterface
{
    private int $id;
    private string $type;
    private string $size;
    private string $color;
    public function __construct(int $id,string $type, string $size, string $color)
    {
        $this->id = $id;
        $this->type = $type;
        $this->size = $size;
        $this->color = $color;

    }

    public function getId(): int
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

    public function getColor(): string
    {
        return $this->color;
    }
}
