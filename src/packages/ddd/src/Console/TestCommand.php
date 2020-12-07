<?php

namespace Wulfheart\DDD\Console;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ddd:test:contr';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A test command for dmake';

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
     * @param  \App\Support\DripEmailer  $drip
     * @return mixed
     */
    public function handle()
    {
       $this->line("Test");
    }
}
