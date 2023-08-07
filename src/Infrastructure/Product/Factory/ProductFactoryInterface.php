<?php
declare(strict_types=1);

namespace Infrastructure\Product\Factory;

use Domain\Product\Model\Collection\DecorationCollection;
use Domain\Product\Model\Tree\Tree;
use Infrastructure\Order\Importer\OrderDataImporter;
use Infrastructure\Product\Entity\DecorationSpecificationEntity;
use Infrastructure\Product\Entity\TreeSpecificationEntity;

interface ProductFactoryInterface
{
    public function create(
        TreeSpecificationEntity|DecorationSpecificationEntity $productSpecification,
        OrderDataImporter $dataImporter
    ): Tree|DecorationCollection;
}
