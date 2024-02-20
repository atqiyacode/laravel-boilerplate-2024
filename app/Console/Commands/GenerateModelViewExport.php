<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class GenerateModelViewExport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:model-view-export';

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
        // Check if the "exports" folder exists, create it if not
        $exportsFolderPath = resource_path('views/exports');
        if (!File::isDirectory($exportsFolderPath)) {
            File::makeDirectory($exportsFolderPath, 0755, true, true);
        }

        // Get all model files in the app/Models directory
        $modelFiles = File::files(app_path('Models'));

        // Extract class names from file names
        $modelClassNames = collect($modelFiles)->map(function ($file) {
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            return $fileName;
        })->toArray();

        // Loop through each model class
        foreach ($modelClassNames as $modelClassName) {
            // Generate the file path
            $filePath = resource_path('views/exports/' . $modelClassName . '.blade.php');

            // Render the Blade view with the specified content
            $content = View::make('export-template')->render();

            // Save the content to the file
            // Save the content to the file, overwriting if it already exists
            File::put($filePath, $content, FILE_USE_INCLUDE_PATH);

            $this->info("File for $modelClassName generated and saved successfully!");
        }

        $this->info('All files generated and saved successfully!');
    }
}
