<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\HRMaster\App\Models\FieldOfWork;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FieldOfWorkSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $lists = [
            "petugas AC/ME dan Genset",
            "keamanan",
            "cleaning service",
            "komputer",
            "penerima tamu",
            "pengiriman",
            "taman",
            "Lainnya",
        ];
        $chunkSize = 200;

        collect($lists)->chunk($chunkSize)->each(function ($chunk) {
            $data = [];

            foreach ($chunk as $key) {
                $data[] = [
                    'name' => Str::upper($key),
                    'description' => 'Description ' . $key,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            FieldOfWork::insert($data);
        });
    }
}
