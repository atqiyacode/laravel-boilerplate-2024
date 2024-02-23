<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ScrapeDataUniversities extends Command
{
    protected $signature = 'scrape:universities';
    protected $description = 'Fetch and update universities from the API';

    public function handle()
    {
        try {
            $this->info('Scraping data university of Indonesia...');

            $client = new Client([
                'verify' => false
            ]);

            $response = $client->request('GET', config('app.api_dikti_university'), []);
            $body = $response->getBody();
            $data = json_decode($body, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Error decoding JSON: ' . json_last_error_msg());
            }

            // Save data to JSON file
            $jsonFileName = 'indonesia_universities.json';
            file_put_contents(public_path($jsonFileName), json_encode($data, JSON_PRETTY_PRINT));

            $this->info('Data scraped and saved to ' . $jsonFileName);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Scraping failed: ' . $e->getMessage());

            // Display a user-friendly error message
            $this->error('An error occurred while scraping data. Please check the logs for more details.');
        }
    }
}
