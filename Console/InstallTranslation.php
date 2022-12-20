<?php

namespace Modules\Translations\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallTranslation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'translations:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install translations permissions to main admin role';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Install Permissions');
        Artisan::call('roles:generate translations');
        $this->info('Your Translations is ready now');

        return Command::SUCCESS;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [ ];
    }
}
