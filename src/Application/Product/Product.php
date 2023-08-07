<?php
declare(strict_types=1);

namespace App\Product;

use Domain\Product\Model\Collection\DecorationCollection;
use Domain\Product\Model\Tree\Tree;
use Infrastructure\Order\Importer\OrderDataImporter;
use Infrastructure\Product\Entity\DecorationSpecificationEntity;
use Infrastructure\Product\Entity\TreeSpecificationEntity;
use Infrastructure\Product\Factory\ProductFactory;
use Infrastructure\Product\Importer\ProductSpecificationDataImporter;

class Product
{
    private Tree $tree;
    private DecorationCollection $decorationCollection;
    private ProductFactory $productFactory;
    private ProductSpecificationDataImporter $productSpecificationDataImporter;

    public function __construct(
        ProductFactory $productFactory,
        ProductSpecificationDataImporter $productSpecificationDataImporter,
    )
    {
        $this->productFactory = $productFactory;
        $this->productSpecificationDataImporter = $productSpecificationDataImporter;
    }

    public function createProducts(OrderDataImporter $orderDataImporter): void
    {
        $this->tree = $this->createTree($orderDataImporter);
        $this->decorationCollection = $this->createDecorations($orderDataImporter);
    }

    public function getTree(): Tree
    {
        return $this->tree;
    }

    public function getDecorations(): DecorationCollection
    {
        return $this->decorationCollection;
    }

    private function createTree(OrderDataImporter $orderDataImporter): Tree
    {
        return $this->productFactory->create($this->getTreeData(), $orderDataImporter);
    }
    private function createDecorations(OrderDataImporter $orderDataImporter): DecorationCollection
    {
        return $this->productFactory->create($this->getDecorationData(), $orderDataImporter);
    }
    private function getDecorationData(): DecorationSpecificationEntity
    {
        return $this->productSpecificationDataImporter->getDecorationSpecification();
    }

    private function getTreeData(): TreeSpecificationEntity
    {
        return $this->productSpecificationDataImporter->getTreeSpecification();
    }
}
