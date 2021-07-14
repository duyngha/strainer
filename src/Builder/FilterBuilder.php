<?php

namespace Packages\Strainer\Builder;

use Illuminate\Pipeline\Pipeline;

class FilterBuilder implements FilterBuilderInterface
{
    protected string $modelName = '';

    protected array $filters = [];

    public function filter()
    {
        return app(Pipeline::class)
                ->send($this->modelName::query())
                ->through($this->filters)
                ->then(function ($res) {
                    return $res->get();
                });
    }

    public function setFilters(array $filters): FilterBuilderInterface
    {
        $this->filters = $filters;
        return $this;
    }

    public function setModel(string $model): FilterBuilderInterface
    {
        $this->modelName = $model;
        return $this;
    }
}
