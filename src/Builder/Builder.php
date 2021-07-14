<?php

namespace Packages\Strainer\Builder;

use Illuminate\Pipeline\Pipeline;

class Builder implements BuilderInterface
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

    public function setFilters(array $filters): BuilderInterface
    {
        $this->filters = $filters;
        return $this;
    }

    public function setModel(string $model): BuilderInterface
    {
        $this->modelName = $model;
        return $this;
    }
}
