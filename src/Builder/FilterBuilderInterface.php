<?php

namespace Packages\Strainer\Builder;

interface FilterBuilderInterface
{
    public function setModel(string $model): FilterBuilderInterface;
    public function setFilters(array $filters): FilterBuilderInterface;
}
