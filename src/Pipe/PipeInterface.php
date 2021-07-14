<?php

namespace Packages\Strainer\Pipe;

use Closure;
use Illuminate\Database\Eloquent\Builder;

interface PipeInterface
{
    public function handle(Builder $builder, Closure $next);
}
