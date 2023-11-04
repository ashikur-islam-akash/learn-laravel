<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;



class traitBuilder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trait {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Trait.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        //trait file create
        $traitClass = file_get_contents(__DIR__ . '/stubs/trait.stub');
        $traitClass = str_replace('{{traitName}}',  $name, $traitClass);
        $traitFilePath = app_path('Traits/' . $name . '.php');

        if (file_exists($traitFilePath)) {
            $this->error('Trait already exists!');
            return;
        }
        // put file into right path
        file_put_contents($traitFilePath, $traitClass);

        $this->info('Trait created successfully!');
    }
}
