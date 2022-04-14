<?php

namespace YlsIdeas\FeatureFlags\Commands;

use Illuminate\Console\Command;
use YlsIdeas\FeatureFlags\Facades\Features;

class ListFeatures extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feature:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all feature flags';

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
     * @return void
     * @throws \ErrorException
     */
    public function handle()
    {
        $features = Features::all();

        if (count($features) === 0) {
            $this->line('No features found');
        } else {
            $this->table(['Feature', 'State'], $features);
        }
    }
}
