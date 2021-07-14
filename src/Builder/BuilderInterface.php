<?php

namespace Packages\Strainer\Builder;

interface BuilderInterface
{
    public function setModel(string $model): BuilderInterface;
    public function setFilters(array $filters): BuilderInterface;
}
