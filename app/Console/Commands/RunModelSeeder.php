<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class RunModelSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Database Seeder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $models = $this->getModelList();

        if (empty($models)) {
            $this->info('No models found.');
        } else {
            $this->showModelList($models);
            $modelIndex = $this->ask('Enter the number of the model to run the seeder for');

            if (is_numeric($modelIndex) && $modelIndex > 0 && $modelIndex <= count($models)) {
                $modelName = $models[$modelIndex - 1];

                // Run the seeder
                $seederClass = $modelName . 'Seeder';

                $this->info("Seeding '$modelName'...");
                Artisan::call('db:seed', ['--class' => $seederClass]);
                $this->info("Seeding completed for '$modelName'.");
            } else {
                $this->error('Invalid input. Please enter a valid number.');
            }
        }
    }

    /**
     * Get a list of all models in the application.
     *
     * @return array
     */
    protected function getModelList()
    {
        $modelNamespace = 'App\\Models\\'; // Adjust the namespace based on your project structure
        $modelPath = app_path('Models');

        $models = [];

        $files = File::allFiles($modelPath);

        foreach ($files as $file) {
            $className = $modelNamespace . $file->getBasename('.php');
            $modelName = class_exists($className) ? class_basename($className) : null;
            $models[] = $modelName;
        }

        return array_filter($models);
    }

    /**
     * Display a table of models.
     *
     * @param array $models
     * @return void
     */
    protected function showModelList(array $models)
    {
        $tableData = [];

        foreach ($models as $key => $model) {
            $tableData[] = [$key + 1, $model];
        }

        $this->table(['Number', 'Model'], $tableData);
    }
}
