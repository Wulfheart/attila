<?php

namespace Wulfheart\DDD\Console;

use Illuminate\Console\GeneratorCommand;

abstract class DomainGeneratorCommand extends GeneratorCommand
{

       /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ddd:domain {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new domain';


    /**
     * Execute the console command.
     *
     * @return bool|null
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        // First we need to ensure that the given name is not a reserved word within the PHP
        // language and that the class name will actually be valid. If it is not valid we
        // can error now and prevent from polluting the filesystem using invalid files.
        if ($this->isReservedName($this->getNameInput())) {
            $this->error('The name "' . $this->getNameInput() . '" is reserved by PHP.');

            return false;
        }

        $name = $this->qualifyClass($this->getNameInput());

        $path = $this->getPath($name);

        if ((!$this->hasOption('force')
            || !$this->option('force')
            ) && $this->alreadyExists($this->getNameInput())) {
            $this->error($this->type . ' already exists!');

            return false;
        }

        $this->line($this->argument('name'));
        return;

        // Next, we will generate the path to the location where this class' file should get
        // written. Then, we will build the class and make the proper replacements on the
        // stub files so that it gets the correctly formatted namespace and class name.
        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildClass($name)));

        $this->info($this->type . ' created successfully.');
    }

    protected function getStub(): string
    {
        return "";
    }
}
