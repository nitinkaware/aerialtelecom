<?php

namespace App\Console\Commands;

use App\Models\Router;
use Illuminate\Console\Command;

class RouterSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'router:seed {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeder the number of routers to database';

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
        $count = $this->argument('count');

        if (! is_numeric($count)) {
            $this->error('The count must be an integer.');

            return;
        }

        Router::factory()
            ->count($count)
            ->create();

        $this->info("Created {$count} records in routers table.");
    }
}
