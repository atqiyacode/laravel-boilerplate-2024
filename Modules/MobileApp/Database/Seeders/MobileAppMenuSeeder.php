<?php

namespace Modules\MobileApp\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\MobileApp\App\Models\MobileAppMenu;
use Illuminate\Database\Seeder;

class MobileAppMenuSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $menuItems = [
            [
                'code' => 'payslip',
                'name' => 'Slip Gaji',
                'description' => 'description',
                'icon' => config('app.url') . '/images/icon/payslip-01.svg',
            ],
            [
                'code' => 'tax',
                'name' => 'Pajak',
                'description' => 'description',
                'icon' => config('app.url') . '/images/icon/tax-01.svg',
            ],
            [
                'code' => 'thr',
                'name' => 'THR',
                'description' => 'description',
                'icon' => config('app.url') . '/images/icon/thr-01.svg',
            ],
            [
                'code' => 'contact',
                'name' => 'Kontak',
                'description' => 'description',
                'icon' => config('app.url') . '/images/icon/contact-01.svg',
            ],
            [
                'code' => 'attandence',
                'name' => 'Absensi',
                'description' => 'description',
                'icon' => config('app.url') . '/images/icon/attandence-01.svg',
            ],
            [
                'code' => 'leave',
                'name' => 'Cuti',
                'description' => 'description',
                'icon' => config('app.url') . '/images/icon/leave-01.svg',
            ],
            [
                'code' => 'reimburst',
                'name' => 'Reimburst',
                'description' => 'description',
                'icon' => config('app.url') . '/images/icon/reimburs-01.svg',
            ],
            [
                'code' => 'dana',
                'name' => 'Dana',
                'description' => 'description',
                'icon' => config('app.url') . '/images/icon/dana-01.svg',
            ],
        ];

        foreach ($menuItems as $menuItem) {
            MobileAppMenu::updateOrCreate(['code' => $menuItem['code']], $menuItem);
        }
    }
}
