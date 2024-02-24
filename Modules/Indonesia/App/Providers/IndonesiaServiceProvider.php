<?php

namespace Modules\Indonesia\App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class IndonesiaServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Indonesia';

    protected string $moduleNameLower = 'indonesia';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/migrations'));
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->autoBindRepositories();
        $this->autoBindServices();
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
        // $this->commands([]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
        // $this->app->booted(function () {
        //     $schedule = $this->app->make(Schedule::class);
        //     $schedule->command('inspire')->hourly();
        // });
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'lang'), $this->moduleNameLower);
            $this->loadJsonTranslationsFrom(module_path($this->moduleName, 'lang'));
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        $this->publishes([module_path($this->moduleName, 'config/config.php') => config_path($this->moduleNameLower . '.php')], 'config');
        $this->mergeConfigFrom(module_path($this->moduleName, 'config/config.php'), $this->moduleNameLower);
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);
        $sourcePath = module_path($this->moduleName, 'resources/views');

        $this->publishes([$sourcePath => $viewPath], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);

        $componentNamespace = str_replace('/', '\\', config('modules.namespace') . '\\' . $this->moduleName . '\\' . config('modules.paths.generator.component-class.path'));
        Blade::componentNamespace($componentNamespace, $this->moduleNameLower);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }

        return $paths;
    }

    private function autoBindRepositories(): void
    {
        // Define the directory where your services are located
        $modelsDirectory = base_path('Modules\\' . $this->moduleName . '\\App\\Models');

        // Scan the Services directory for PHP files
        $modelFiles = \Illuminate\Support\Facades\File::glob($modelsDirectory . '/*.php');

        foreach ($modelFiles as $modelFile) {
            // Extract the class name from the file path
            $className = basename($modelFile, '.php');

            // Define the namespace for service interfaces
            $repositoryNamespace = 'Modules\\' . $this->moduleName . '\\App\Repositories\\' . $className . '\\';

            // Define the namespace for service implementations
            $implementationNamespace = 'Modules\\' . $this->moduleName . '\\App\Repositories\\' . $className . '\\';

            // Assuming your convention is ClassNameService for interfaces
            $repositoryInterface = $repositoryNamespace . $className . 'Repository';

            // Assuming your convention is ClassNameServiceImplement for implementations
            $implementationClass = $implementationNamespace . $className . 'RepositoryImplement';

            // Bind the interface to its implementation
            $this->app->bind($repositoryInterface, $implementationClass);
        }
    }

    /**
     * Auto-bind services.
     */
    private function autoBindServices(): void
    {
        // Define the directory where your services are located
        $modelsDirectory = base_path('Modules\\' . $this->moduleName . '\\App\\Models');

        // Scan the Services directory for PHP files
        $modelFiles = \Illuminate\Support\Facades\File::glob($modelsDirectory . '/*.php');

        foreach ($modelFiles as $modelFile) {
            // Extract the class name from the file path
            $className = basename($modelFile, '.php');

            // Define the namespace for service interfaces
            $serviceNamespace = 'Modules\\' . $this->moduleName . '\\App\Services\\' . $className . '\\';

            // Define the namespace for service implementations
            $implementationNamespace = 'Modules\\' . $this->moduleName . '\\App\Services\\' . $className . '\\';

            // Assuming your convention is ClassNameService for interfaces
            $serviceInterface = $serviceNamespace . $className . 'Service';

            // Assuming your convention is ClassNameServiceImplement for implementations
            $implementationClass = $implementationNamespace . $className . 'ServiceImplement';

            // Bind the interface to its implementation
            $this->app->bind($serviceInterface, $implementationClass);
        }
    }
}
