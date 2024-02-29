<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Master\App\Models\University;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $filePath = public_path('indonesia_universities.json');

        // Read data from the JSON file
        $jsonData = file_get_contents($filePath);
        $universitiesToInsert = json_decode($jsonData, true);
        $data = [];
        foreach ($universitiesToInsert as $university) {
            $data[] = [
                'name' => $university['nama_pt'],
                'id_sp' => $university['id_sp'],
                'kode_pt' => $university['kode_pt'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }


        if (!empty($data)) {
            // Split the data into chunks
            $chunks = array_chunk($data, 250);

            foreach ($chunks as $chunk) {
                // Upsert data into the University model
                University::upsert($chunk, ['name', 'id_sp', 'kode_pt'], ['created_at', 'updated_at']);
            }
        }
    }
}
