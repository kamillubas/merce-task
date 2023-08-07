<?php

namespace Domain\Product\Model\Specification;

interface ProductSpecificationInterface
{
    public function getTreeSpecification(): TreeSpecificationInterface;

    public function getDecorationSpecification(): DecorationSpecificationInterface;
}
