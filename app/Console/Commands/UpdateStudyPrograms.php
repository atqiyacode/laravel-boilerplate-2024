<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Modules\Master\App\Models\University;

class UpdateStudyPrograms extends Command
{
    protected $signature = 'update:study-programs';
    protected $description = 'Fetch and update Study Programs from the API';

    public function handle()
    {
        // Ensure the "program-study" folder exists
        $folderPath = public_path("program-study");
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        $client = new Client([
            'verify' => false
        ]);

        // Fetch all university IDs
        $universityIds = University::where('id', '>=', 7015)->pluck('name', 'kode_pt');

        // Store study program data in an array
        $allStudyPrograms = [];

        $bar = $this->output->createProgressBar(count($universityIds));

        // Asynchronously fetch study programs for each university
        $studyPrograms = collect($universityIds)->map(function ($name, $kode_pt) use ($client, $bar, &$allStudyPrograms) {
            try {
                $response = $client->get(config('app.api_dikti_study_program') . '/' . $name);
                $bar->advance();

                if ($response->getStatusCode() === 200) {
                    $studyPrograms = json_decode($response->getBody(), true);

                    // Store the study program data
                    $allStudyPrograms[$name] = $studyPrograms;

                    $universityName = strtoupper(preg_replace('/[^A-Za-z0-9]/', '_', $name));
                    // Save study program data to a JSON file for each university
                    $jsonFilePath = public_path("program-study/" . str_replace(' ', '', $kode_pt) . "_" . $universityName . ".json");

                    file_put_contents($jsonFilePath, json_encode($studyPrograms));

                    return $studyPrograms;
                }
            } catch (RequestException $e) {
                // Handle 404 response
                if ($e->getResponse() && $e->getResponse()->getStatusCode() == 404) {
                    $this->error("Study programs not found for university: $name");
                } else {
                    // Handle other request exceptions
                    $this->error("Failed to fetch study programs for $name: " . $e->getMessage());
                }
            }

            return null;
        })->filter(); // Remove null values

        $bar->finish();
        $this->line(''); // New line after progress bar

    }
}
