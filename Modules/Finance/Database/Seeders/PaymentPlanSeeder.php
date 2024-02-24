<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Finance\App\Models\PaymentPlan;
use Modules\Finance\App\Models\Unit;
use Illuminate\Database\Seeder;

class PaymentPlanSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $units = Unit::all();
        foreach ($units as $key) {
            PaymentPlan::factory()->create([
                'name_of_kak' => 'Dummy Sample Name of KAK - ' . $key->id,
                'unit_id' => $key->id,
            ]);
        }
    }
}
