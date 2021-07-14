<?php

namespace Packages\Strainer\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Filesystem\FileExistsException;

class MakeFilter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:filter {filterName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a filter pipeline';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (File::exists(app_path() . '/Filters') === false) {
            File::makeDirectory(app_path() . '/Filters');
        }

        $path = app_path() . '/Filters/' . $this->argument('filterName') . '.php';

        if (File::exists($path)) {
            throw new FileExistsException("{$this->argument('filterName')} file already exists");
        }

        $content = <<<EOT
// remove this comment <?php
namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Packages\Strainer\Pipe\PipeAbstract;

class {$this->argument('filterName')} extends PipeAbstract
{
    protected string \$name = '';

    public function action(Builder \$builder): Builder
    {
        //
    }
}
EOT;

        File::put($path, $content);
    }
}
