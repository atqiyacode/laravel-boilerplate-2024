<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\University;

class UpdateUniversities extends Command
{
    protected $signature = 'update:universities';
    protected $description = 'Fetch and update universities from the API';

    public function handle()
    {
        $client = new Client([
            'verify' => false
        ]);

        $response = $client->request('GET', config('app.api_dikti_university'), []);
        $body = $response->getBody();
        $data = json_decode($body, true);
        $universitiesToInsert = [];

        foreach ($data as $university) {
            $universitiesToInsert[] = [
                'name' => $university['nama_pt'],
                'id_sp' => $university['id_sp'],
                'kode_pt' => $university['kode_pt'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $chunks = array_chunk($universitiesToInsert, 100);

        foreach ($chunks as $chunk) {
            University::upsert($chunk, ['name', 'id_sp', 'kode_pt'], null);
        }

        $this->info('Universities updated successfully!');
    }
}
