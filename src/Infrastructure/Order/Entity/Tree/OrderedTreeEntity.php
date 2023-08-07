<?php
declare(strict_types=1);

namespace Infrastructure\Order\Entity\Tree;

use Domain\Order\Model\Product\Tree\OrderedTreeInterface;

class OrderedTreeEntity implements OrderedTreeInterface
{
    private string $id;
    private string $type;
    private string $size;
    public function __construct(string $id, string $type, string $size)
    {
        $this->id = $id;
        $this->type = $type;
        $this->size = $size;
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
}
