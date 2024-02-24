<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $modelFiles = File::files(app_path('Models'));

        // Extract class names from file names
        $modelClassNames = collect($modelFiles)->map(function ($file) {
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            return Str::snake($fileName);
        })->toArray();

        // Create permissions for each model
        foreach ($modelClassNames as $modelName) {
            $permissions = [
                'view_' . $modelName,
                'create_' . $modelName,
                'edit_' . $modelName,
                'delete_' . $modelName,
                'restore_' . $modelName,
                'force_delete_' . $modelName,
                'download_' . $modelName,
            ];

            foreach ($permissions as $permission) {
                Permission::updateOrCreate(['name' => $permission, 'guard_name' => 'sanctum']);
            }
        }
    }
}
