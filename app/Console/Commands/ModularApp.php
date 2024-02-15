<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ModularApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:module {moduleName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $moduleName = $this->ask('Module Name ?');

        if (empty($moduleName)) {
            $this->info('Module is required.');
        } else {
            Artisan::call('module:make ' . $moduleName);
            sleep(3);
            Artisan::call('module:make-request Create' . $moduleName . 'Request ' . $moduleName);
            Artisan::call('module:make-request Update' . $moduleName . 'Request ' . $moduleName);
            Artisan::call('module:make-resource ' . $moduleName . 'Resource ' . $moduleName);
        }
    }
}
