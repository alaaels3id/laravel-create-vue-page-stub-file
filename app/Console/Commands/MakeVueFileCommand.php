<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class MakeVueFileCommand extends Command
{
    protected $signature = 'make:vue {path}';

    protected $description = 'Create Vue file Command description';

    public function handle(): void
    {
        $ds = DIRECTORY_SEPARATOR;

        $path = str($this->argument('path'))->lower();

        $folders = explode('.', $path);

        $file_index = array_key_last($folders);

        $_folders = Arr::except($folders, $file_index);

        $_path = resource_path('/js/components/') . implode($ds, $_folders);

        $_file_path = $_path . $ds . $folders[$file_index] . '.vue';

        File::ensureDirectoryExists($_path);

        if(File::exists($_file_path))
        {
            $this->warn('File already exists');
            return;
        }

        File::put($_file_path, file_get_contents(base_path('/stubs/vue.stub')));

        $this->info('File created successfully');
    }
}
