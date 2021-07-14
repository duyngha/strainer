<?php

namespace Packages\Strainer\Pipe;

use Closure;
use Exception;
use Illuminate\Database\Eloquent\Builder;

abstract class PipeAbstract implements PipeInterface
{
    protected string $name = '';

    public function handle(Builder $builder, Closure $next)
    {
        if ($this->name === '') {
            throw new Exception('Filter name must be set');
        }

        return $next($this->action($builder));
    }

    abstract public function action(Builder $builder): Builder;
}
