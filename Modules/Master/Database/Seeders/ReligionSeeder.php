<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Master\App\Models\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $list = [
            'Islam',
            'Hindu',
            'Budha',
            'Kristen',
            'Protestan',
            'Konghucu',
            'Lainnya'
        ];
        collect($list)->each(function ($value) {
            Religion::create([
                'name' => $value
            ]);
        });
    }
}
