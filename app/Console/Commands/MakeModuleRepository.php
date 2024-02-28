<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeModuleRepository extends Command
{
    protected $signature = 'module:make-interfaces';

    protected $description = 'Generate repository and service interfaces for a module';

    public function handle()
    {
        $moduleName = $this->getModuleName();
        $modelName = $this->getModelName();

        $modulesDirectory = base_path("Modules\\{$moduleName}");
        $modelDirectory = base_path("Modules\\App\\Models\\{$modelName}.php");

        if (!File::exists($modulesDirectory)) {
            $this->error('Modules directory not found. Please create the Modules directory.');
            return;
        }

        if (!File::exists($modelDirectory)) {
            $this->error('Model not found. Please create the Model.');
            return;
        }

        $this->createInterface('Repository', $moduleName, $modelName);
        $this->createInterface('Service', $moduleName, $modelName);

        $this->createRepositoryImplement($moduleName, $modelName);
        $this->createServiceImplement($moduleName, $modelName);

        $this->info('Interfaces generated successfully.');
    }

    protected function createInterface($type, $moduleName, $modelName)
    {
        $stubPath = base_path("stubs/nwidart-stubs/{$type}Interface.stub");
        $folderType = $type === 'Repository' ? 'Repositories' : 'Services';
        $interfacePath = base_path("Modules/{$moduleName}/App/{$folderType}/{$modelName}/{$moduleName}{$type}.php");

        $this->createDirectory($interfacePath);

        if (!File::exists($interfacePath)) {
            $stubContent = str_replace(
                ['$NAMESPACE$', '$CLASS$'],
                ["Modules\\{$moduleName}\\App\\{$folderType}\\{$modelName}", "{$moduleName}{$type}"],
                File::get($stubPath)
            );
            File::put($interfacePath, $stubContent);
            $this->info("{$moduleName}{$type}Interface created successfully.");
        } else {
            $this->info("{$moduleName}{$type}Interface already exists.");
        }
    }

    protected function createRepositoryImplement($moduleName, $modelName)
    {
        // $type = 'Repository';
        $stubPath = base_path("stubs/nwidart-stubs/RepositoryImplement.stub");
        $implementPath = base_path("Modules/{$moduleName}/App/Repositories/{$modelName}/{$modelName}RepositoryImplement.php");

        $this->createDirectory($implementPath);

        if (!File::exists($implementPath)) {
            $stubContent = str_replace(
                [
                    '$MODULE_NAME$',

                    '$NAMESPACE$',
                    '$CLASS$',

                    '$REPOSITORY_INTERFACE$',

                    '$MODEL$',
                    '$MODEL_NAME$',

                    '$EXPORT_NAME$',
                ],
                [
                    // module
                    "{$modelName}",
                    // namespace
                    "Modules\\{$moduleName}\\App\\Repositories\\{$modelName}",
                    // class
                    "{$moduleName}RepositoryImplement",
                    // repository
                    "{$modelName}Repository",
                    // model
                    "Modules\\{$moduleName}\\App\\Models\\{$modelName}",
                    "{$modelName}",
                    // export
                    "\\Modules\\{$moduleName}\\App\\Exports\\{$modelName}Export",


                ],
                File::get($stubPath)
            );
            File::put($implementPath, $stubContent);
            $this->info("{$moduleName}RepositoryImplement created successfully.");
        } else {
            $this->info("{$moduleName}RepositoryImplement already exists.");
        }
    }

    protected function createServiceImplement($moduleName, $modelName)
    {
        // $type = 'Service';
        $stubPath = base_path("stubs/nwidart-stubs/ServiceImplement.stub");
        // $folderType = $type === 'Repository' ? 'Repositories' : 'Services';
        $implementPath = base_path("Modules/{$moduleName}/App/Services/{$modelName}/{$moduleName}ServiceImplement.php");

        $this->createDirectory($implementPath);

        if (!File::exists($implementPath)) {
            $stubContent = str_replace(
                [
                    '$NAMESPACE$',
                    '$CLASS$',

                    '$RESOURCE_NAMESPACE$',
                    '$RESOURCE_NAME$',

                    '$REPOSITORY_NAMESPACE$',
                    '$MAIN_REPOSITORY$',

                    '$SERVICE_INTERFACE$',
                ],
                [
                    // namespace
                    "Modules\\{$moduleName}\\App\\Services\\{$modelName}",
                    // class
                    "{$moduleName}ServiceImplement",
                    // resource
                    "Modules\\{$moduleName}\\App\\Http\\Resources\\{$modelName}Resource",
                    "{$moduleName}Resource",
                    // repository
                    "Modules\\{$moduleName}\\App\\Repositories\\{$modelName}\\{$modelName}Repository",
                    "{$modelName}Repository",
                    // service
                    "{$modelName}Service"


                ],
                File::get($stubPath)
            );
            File::put($implementPath, $stubContent);
            $this->info("{$moduleName}ServiceImplement created successfully.");
        } else {
            $this->info("{$moduleName}ServiceImplement already exists.");
        }
    }

    protected function createDirectory($path)
    {
        $directory = dirname($path);

        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }
    }

    private function getModuleName()
    {
        $module = null;

        while (empty($module)) {
            $module = $this->ask('What is the module name?');
        }

        return $module;
    }

    private function getModelName()
    {
        $model = null;

        while (empty($model)) {
            $model = $this->ask('What is the model name?');
        }

        return $model;
    }
}
