<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Master\App\Models\StudyProgram;
use Modules\Master\App\Models\University;
use Illuminate\Database\Seeder;

class StudyProgramSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $files = glob(public_path('program-study/*.json'));

        foreach ($files as $file) {
            $fileName = basename($file);

            // Extract kode_pt and university name from the file name
            $kode_pt = strtok($fileName, '_'); // Get all characters before the first underscore
            $univName = substr($fileName, strlen($kode_pt) + 1, -5); // Get characters between the first underscore and the last 5 characters

            // Find the associated university using the extracted values
            $university = University::where([
                // 'kode_pt' => $kode_pt,
                'name' => str_replace('_', ' ', $univName),
            ])->first();

            $data = json_decode(file_get_contents($file), true);

            if ($data) {
                $studyProgramsToInsert = [];

                foreach ($data as $prody) {
                    if (isset($prody['nm_lemb'], $prody['id_sms'], $prody['kode_prodi']) && $prody['nm_lemb'] !== '' && $prody['id_sms'] !== '' && $prody['kode_prodi'] !== '') {
                        $studyProgramsToInsert[] = [
                            'university_id' => $university ?  $university->id : null,
                            'name' => $prody['nm_lemb'],
                            'id_prodi' => $prody['id_sms'],
                            'kode_prodi' => $prody['kode_prodi'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }

                if (!empty($studyProgramsToInsert)) {
                    $chunkedData = array_chunk($studyProgramsToInsert, 200); // Adjust the chunk size as needed

                    foreach ($chunkedData as $chunk) {
                        StudyProgram::upsert($chunk, ['name', 'id_prodi', 'kode_prodi'], ['created_at', 'updated_at']);
                    }

                    $this->command->info("Data from $fileName seeded successfully.");
                } else {
                    $this->command->warn("No valid data in file: $fileName");
                }
            } else {
                $this->command->warn("Error decoding JSON in file: $fileName");
            }
        }
    }
}
