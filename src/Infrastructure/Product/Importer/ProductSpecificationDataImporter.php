<?php
declare(strict_types=1);

namespace Infrastructure\Product\Importer;

use Domain\Product\Model\Specification\ProductSpecificationInterface;
use Infrastructure\Product\Entity\DecorationSpecificationEntity;
use Infrastructure\Product\Entity\TreeSpecificationEntity;

class ProductSpecificationDataImporter implements ProductSpecificationInterface
{
    private array $treeData;
    private array $decorationsData;
    public function __construct(array $treeData, array $decorationsData)
    {
        $this->treeData = $treeData;
        $this->decorationsData = $decorationsData;
    }
    public function getTreeSpecification(): TreeSpecificationEntity
    {
        return new TreeSpecificationEntity($this->treeData['types'],
            $this->treeData['sizes'],
            $this->treeData['prices'],
            $this->treeData['rows']
        );
    }

    public function getDecorationSpecification(): DecorationSpecificationEntity
    {
        return new DecorationSpecificationEntity(
            $this->decorationsData['types'],
            $this->decorationsData['colors'],
            $this->decorationsData['sizes'],
            $this->decorationsData['prices']
        );
    }
}
