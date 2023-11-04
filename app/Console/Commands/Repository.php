<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class Repository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Repository following abstract method & interface method';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');


        // Abstract file create
        $abstarctClass = file_get_contents(__DIR__ . '/stubs/abstract.stub');
        $abstarctClass = str_replace('{{abstractName}}', $name, $abstarctClass);
        $abstarctFilePath = app_path('Repositories/' . $name  . '/' .   $name . 'Abstract' . '.php');

        //interface file create
        $interfaceClass = file_get_contents(__DIR__ . '/stubs/interface.stub');
        $interfaceClass = str_replace('{{interfaceName}}', $name, $interfaceClass);
        $interfaceFilePath = app_path('Repositories/' . $name  . '/' . $name . 'Interface' . '.php');

        $this->makeFolder($name);

        // put file into right path
        file_put_contents($abstarctFilePath, $abstarctClass);
        file_put_contents($interfaceFilePath, $interfaceClass);

        $this->info($name . " Repository Created Sucessfully.");
    }

    function makeFolder($path)
    {
        $directory = app_path('Repositories/' . $path);

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
            $this->info("Folder Created Sucessfully.");
        } else {
            $this->error("Folder already exists!");
            return;
        }
    }
}
