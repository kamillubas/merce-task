<?php
declare(strict_types=1);

namespace Infrastructure\Product\Factory;

use Domain\Product\Model\Collection\DecorationCollection;
use Domain\Product\Model\Decoration\Decoration;
use Domain\Product\Model\Tree\Tree;
use Infrastructure\Order\Entity\Collection\OrderedDecorationCollectionEntity;
use Infrastructure\Order\Entity\Decoration\OrderedDecorationEntity;
use Infrastructure\Order\Entity\Tree\OrderedTreeEntity;
use Infrastructure\Order\Importer\OrderDataImporter;
use Infrastructure\Product\Entity\DecorationSpecificationEntity;
use Infrastructure\Product\Entity\TreeSpecificationEntity;

class ProductFactory implements ProductFactoryInterface
{
    public function create(
        TreeSpecificationEntity|DecorationSpecificationEntity $productSpecification,
        OrderDataImporter                                     $dataImporter
    ): Tree|DecorationCollection
    {
        if ($productSpecification instanceof TreeSpecificationEntity) {
            return $this->createTree($productSpecification, $dataImporter->getOrderedTree());
        }

        return $this->createDecorations($productSpecification, $dataImporter->getOrderedDecorations());
    }

    private function createTree(TreeSpecificationEntity $productData, OrderedTreeEntity $treeData): Tree
    {
        $type = ($this->checkValueExists($productData->getTypes(), $treeData->getType())) ? $treeData->getType() : null;
        $size = ($this->checkValueExists($productData->getSizes(), $treeData->getSize())) ? $treeData->getSize() : null;
        $price = ($this->checkValueExists($productData->getPrices(), $size)) ? $productData->getPrices()[$size] : null;
        $rows = $productData->getRows()[$size];

        return new Tree(uniqid('tree'), $type, $size, $price, $rows);
    }

    public function createDecorations(
        DecorationSpecificationEntity     $productData,
        OrderedDecorationCollectionEntity $decorationCollectionEntity
    ): DecorationCollection
    {
        $decorationCollection = new DecorationCollection();
        /** @var $decoration OrderedDecorationEntity */
        foreach ($decorationCollectionEntity->getOrderedDecorations() as $decoration) {
            $type = ($this->checkValueExists(
                $productData->getTypes(),
                $decoration->getType(),
                $decoration->getSize())) ? $decoration->getType() : null;

            $color = ($this->checkValueExists($productData->getColors(),
                $decoration->getColor(),
                $decoration->getSize())) ? $decoration->getColor() : null;

            $size = ($this->checkValueExists($productData->getSizes(),
                $decoration->getSize())) ? $decoration->getSize() : null;

            $price = ($this->checkValueExists($productData->getPrices(),
                $decoration->getColor(),
                $decoration->getSize())) ?
                $this->fetchDecorationPrice($productData->getPrices(), $type, $size, $color) : null;


            $decorationCollection->add(
                new Decoration(
                    uniqid('decoration'),
                    $type,
                    $color,
                    $size,
                    $price
                )
            );
        }

        return $decorationCollection;
    }

    private function checkValueExists(array $productData, string $field, ?string $size = null): bool
    {
        $valueToCheck = is_null($size) ? $field : $size;
        return in_array($valueToCheck, $productData) || array_key_exists($valueToCheck, $productData);
    }

    private function fetchDecorationPrice(array $productData, string $type, string $size, string $color): float
    {
        if ($color === 'hand painted') {
            return $productData[$size][$color][$type];
        }
        return $productData[$size][$color];
    }
}
