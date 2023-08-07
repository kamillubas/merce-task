<?php

namespace Domain\Product\Model\Specification;

interface TreeSpecificationInterface
{
    public function getTypes(): array;

    public function getSizes(): array;

    public function getPrices(): array;

    public function getRows(): array;
}

