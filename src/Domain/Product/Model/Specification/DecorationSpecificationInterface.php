<?php

namespace Domain\Product\Model\Specification;

interface DecorationSpecificationInterface
{
    public function getTypes(): array;

    public function getColors(): array;

    public function getSizes(): array;

    public function getPrices(): array;
}
