<?php
declare(strict_types=1);

namespace Domain\Order\Model;

use Domain\Product\Model\Collection\DecorationCollection;
use Domain\Product\Model\Tree\Tree;

class Order
{
    private string $id;
    private Tree $tree;
    private DecorationCollection $decorations;
    private string $currency;

    public function __construct(string $id, Tree $tree, DecorationCollection $decorations, string $currency)
    {
        $this->id = $id;
        $this->tree =$tree;
        $this->decorations = $decorations;
        $this->currency = $currency;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTree(): Tree
    {
        return $this->tree;
    }

    public function getDecorations(): DecorationCollection
    {
        return $this->decorations;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}
