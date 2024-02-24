<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Modules\Master\App\Models\PermitStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermitStatusSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $permitStatusData = [
            [
                'id' => 1,
                'name' => 'submitted',
                'slug' => Str::slug('submitted'),
                'description' => 'Pengajuan anda berhasil, menunggu approval 1',
            ],
            [
                'id' => 2,
                'name' => 'accepted approval 1',
                'slug' => Str::slug('accepted-approval-1'),
                'description' => 'Pengajuan anda disetujui pada approval 1, menunggu persetujuan approval 2',
            ],
            [
                'id' => 3,
                'name' => 'rejected approval 1',
                'slug' => Str::slug('rejected-approval-1'),
                'description' => 'Pengajuan anda ditolak pada approval 1, izin anda ditolak',
            ],
            [
                'id' => 4,
                'name' => 'accepted',
                'slug' => Str::slug('accepted'),
                'description' => 'Pengajuan anda telah disetujui dan diterima',
            ],
            [
                'id' => 5,
                'name' => 'rejected',
                'slug' => Str::slug('rejected'),
                'description' => 'Pengajuan anda ditolak',
            ],
            [
                'id' => 6,
                'name' => 'cancelled',
                'slug' => Str::slug('cancelled'),
                'description' => 'Anda telah membatalkan pengajuan izin',
            ],
            [
                'id' => 7,
                'name' => 'expired',
                'slug' => Str::slug('expired'),
                'description' => 'Pengajuan izin anda telah melalui batas waktu dan sudah expired',
            ],
        ];

        PermitStatus::insert($permitStatusData);
    }
}
